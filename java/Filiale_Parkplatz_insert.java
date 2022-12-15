package com.company;
import java.sql.*;
import java.io.*;
public class Filiale_Parkplatz_insert{
    public static void main(String[] args) {
        String jdbcURL = "jdbc:oracle:thin:@oracle-lab.cs.univie.ac.at:1521:lab";
        String username = "a01642049";
        String password = "dbs20";

        String csvFilePath = "B:\\Mozila downloads\\Filiale_Parkplatz.csv";


        Connection connection = null;

        try {

            connection = DriverManager.getConnection(jdbcURL, username, password);

            String sql = "INSERT INTO FILIALE_PARKPLATZ (id_nummer, Zertifizierungsnummer, Fassungsvermoegen, Anzahl_Ebenen) VALUES (?, ?, ?, ?)";
            PreparedStatement statement = connection.prepareStatement(sql);

            BufferedReader lineReader = new BufferedReader(new FileReader(csvFilePath));
            String lineText = null;


            lineReader.readLine(); // skip header line

            while ((lineText = lineReader.readLine()) != null) {
                String[] data = lineText.split(",");
                String id_nummer = data[0];
                String Zertifizierungsnummer = data[1];
                String Fassungsvermoegen = data[2];
                String Anzahl_Ebenen = data[3];

                statement.setString(1, id_nummer);
                statement.setString(2, Zertifizierungsnummer);
                statement.setString(3, Fassungsvermoegen);
                statement.setString(4, Anzahl_Ebenen);

                statement.executeQuery();

            }


            ResultSet rs = statement.executeQuery("SELECT * FROM FILIALE_PARKPLATZ");
            System.out.println("FILIALE_PARKPLATZ DATA INSERTED:");
            while (rs.next()) {
                System.out.println( rs.getInt("id_nummer") + "  " + rs.getInt("Zertifizierungsnummer") +
                        "  " + rs.getInt("Fassungsvermoegen") + "  " + rs.getInt("Anzahl_Ebenen"));
            }

            lineReader.close();
            rs.close();
            statement.close();
            connection.close();


        } catch (Exception e) {
            System.err.println(e.getMessage());
        }


    }

}
