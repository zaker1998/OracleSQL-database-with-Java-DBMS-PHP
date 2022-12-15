<?php

class DatabaseHelper
{
    // Since the connection details are constant, define them as const
    // We can refer to constants like e.g. DatabaseHelper::username
    const username = 'a01642049'; // use a + your matriculation number
    const password = 'dbs20'; // use your oracle db password
    const con_string = 'lab';

    // Since we need only one connection object, it can be stored in a member variable.
    // $conn is set in the constructor.
    protected $conn;

    // Create connection in the constructor
    public function __construct()
    {
        try {
            // Create connection with the command oci_connect(String(username), String(password), String(connection_string))
            // The @ sign avoids the output of warnings
            // It could be helpful to use the function without the @ symbol during developing process
            $this->conn = @oci_connect(
                DatabaseHelper::username,
                DatabaseHelper::password,
                DatabaseHelper::con_string
            );

            //check if the connection object is != null
            if (!$this->conn) {
                // die(String(message)): stop PHP script and output message:
                die("DB error: Connection can't be established!");
            }

        } catch (Exception $e) {
            die("DB error: {$e->getMessage()}");
        }
    }

    public function __destruct()
    {
        // clean up
        @oci_close($this->conn);
    }

    // This function creates and executes a SQL select statement and returns an array as the result
    // 2-dimensional array: the result array contains nested arrays (each contains the data of a single row)
    public function selectAllAuto($Motorseriennummer, $Zertifizierungsnummer, $Klasse, $Vermietungspreis)
    {
        // Define the sql statement string
        $sql = "SELECT * FROM Auto
            WHERE Motorseriennummer LIKE '%{$Motorseriennummer}%'
              AND upper(Zertifizierungsnummer) LIKE upper('%{$Zertifizierungsnummer}%')
              AND upper(Klasse) LIKE upper('%{$Klasse}%')
			  AND upper(Vermietungspreis) LIKE upper('%{$Vermietungspreis}%')
            ORDER BY Motorseriennummer ASC";

        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = @oci_parse($this->conn, $sql);

        // Executes the statement
        @oci_execute($statement);

        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        @oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        @oci_free_statement($statement);

        return $res;
    }

    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function insertIntoVermieter($AG_nummer, $Gruendungsjahr, $PLZ, $Strasse)
    {
        $sql = "INSERT INTO Vermieter VALUES ('{$AG_nummer}', '{$Gruendungsjahr}','{$PLZ}','{$Strasse}')";

        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }
	
	public function insertIntoFiliale($Adresse, $Anzahl_Mitarbeiter, $AG_nummer)
    {
        $sql = "INSERT INTO Filiale (Adresse,Anzahl_Mitarbeiter,AG_nummer) VALUES ('{$Adresse}','{$Anzahl_Mitarbeiter}','{$AG_nummer}')";

        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }
	
	public function insertIntoFiliale_Parkplatz($id_nummer, $Zertifizierungsnummer, $Fassungsvermoegen, $Anzahl_Ebenen)
    {
        $sql = "INSERT INTO Filiale_Parkplatz VALUES ('{$id_nummer}', '{$Zertifizierungsnummer}','{$Fassungsvermoegen}','{$Anzahl_Ebenen}')";

        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }

	public function insertIntoAuto($Motorseriennummer, $Zertifizierungsnummer, $Klasse, $Vermietungspreis, $id_nummer)
    {
        $sql = "INSERT INTO Auto VALUES ('{$Motorseriennummer}', '{$Zertifizierungsnummer}','{$Klasse}','{$Vermietungspreis}','{$id_nummer}')";

        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }
	
	public function insertIntoMitarbeiter($Personalnummer, $Name, $geburtsdatum, $id_nummer)
    {
        $sql = "INSERT INTO Mitarbeiter VALUES ('{$Personalnummer}', '{$Name}', to_date('$geburtsdatum','YYYY-MM-DD'),'{$id_nummer}')";

        $statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
    }
	

	
	
	
	
	//Update function
	public function UpdateMitarbeiter($Personalnummer, $Name, $geburtsdatum, $id_nummer)
	{
		$sql = "Update Mitarbeiter SET Name = '{$Name}', geburtsdatum = to_date('$geburtsdatum','YYYY-MM-DD'), id_nummer ='{$id_nummer}' WHERE Personalnummer = '{$Personalnummer}'";
		
		$statement = @oci_parse($this->conn, $sql);
        $success = @oci_execute($statement) && @oci_commit($this->conn);
        @oci_free_statement($statement);
        return $success;
	}
	
	
	
	
	
	
	
	
	
	
	
	// Using a Procedure
    // This function uses a SQL procedure to delete a person and returns an errorcode (&errorcode == 1 : OK)
    public function deleteMitarbeiter($Personalnummer)
    {
        // It is not necessary to assign the output variable,
        // but to be sure that the $errorcode differs after the execution of our procedure we do it anyway
        $errorcode = 0;

        // In our case the procedure P_DELETE_PERSON takes two parameters:
        //  1. person_id (IN parameter)
        //  2. error_code (OUT parameter)

        // The SQL string
        $sql = 'BEGIN p_delete_mitarbeiter(:Personalnummer, :errorcode); END;';
        $statement = @oci_parse($this->conn, $sql);

        //  Bind the parameters
        @oci_bind_by_name($statement, ':Personalnummer', $Personalnummer);
        @oci_bind_by_name($statement, ':errorcode', $errorcode);

        // Execute Statement
        @oci_execute($statement);

        //Note: Since we execute COMMIT in our procedure, we don't need to commit it here.
        //@oci_commit($statement); //not necessary

        //Clean Up
        @oci_free_statement($statement);

        //$errorcode == 1 => success
        //$errorcode != 1 => Oracle SQL related errorcode;
        return $errorcode;
    }
}