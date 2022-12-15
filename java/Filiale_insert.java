package com.company;
import java.sql.*;
import java.io.*;
public class Filiale_insert{
    public static void main(String[] args) {
        String jdbcURL = "jdbc:oracle:thin:@oracle-lab.cs.univie.ac.at:1521:lab";
        String username = "a01642049";
        String password = "dbs20";

        String csvFilePath = "B:\\Mozila downloads\\Filiale.csv";


        Connection connection = null;

        try {

            connection = DriverManager.getConnection(jdbcURL, username, password);

            String sql = "INSERT INTO FILIALE (id_nummer, Adresse, Anzahl_Mitarbeiter, AG_nummer) VALUES (?, ?, ?, ?)";
            PreparedStatement statement = connection.prepareStatement(sql);

            BufferedReader lineReader = new BufferedReader(new FileReader(csvFilePath));
            String lineText = null;


            lineReader.readLine(); // skip header line

            while ((lineText = lineReader.readLine()) != null) {
                String[] data = lineText.split(",");
                String id_nummer = data[0];
                String Adresse = data[1];
                String Anzahl_Mitarbeiter = data[2];
                String AG_nummer = data[3];

                statement.setString(1, id_nummer);
                statement.setString(2, Adresse);
                statement.setString(3, Anzahl_Mitarbeiter);
                statement.setString(4, AG_nummer);

                statement.executeQuery();

            }


            ResultSet rs = statement.executeQuery("SELECT * FROM FILIALE");
            System.out.println("FILIALE DATA INSERTED:");
            while (rs.next()) {
                System.out.println( rs.getInt("id_nummer") + "  " + rs.getString("Adresse") +
                        "  " + rs.getInt("Anzahl_Mitarbeiter") + "  " + rs.getInt("AG_nummer"));
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
