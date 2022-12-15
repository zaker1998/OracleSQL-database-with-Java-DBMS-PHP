package com.company;
import java.sql.*;
import java.io.*;
public class Mitarbeiter_insert{
    public static void main(String[] args) {
        String jdbcURL = "jdbc:oracle:thin:@oracle-lab.cs.univie.ac.at:1521:lab";
        String username = "a01642049";
        String password = "dbs20";

        String csvFilePath = "B:\\Mozila downloads\\Mitarbeiter_10k.csv";


        Connection connection = null;

        try {

            connection = DriverManager.getConnection(jdbcURL, username, password);

            String sql = "INSERT INTO Mitarbeiter (Personalnummer, Name, geburtsdatum, id_nummer) VALUES (?, ?, ?, ?)";
            PreparedStatement statement = connection.prepareStatement(sql);

            BufferedReader lineReader = new BufferedReader(new FileReader(csvFilePath));
            String lineText = null;


            lineReader.readLine(); // skip header line

            while ((lineText = lineReader.readLine()) != null) {
                String[] data = lineText.split(",");
                String Personalnummer = data[0];
                String Name = data[1];
                String geburtsdatum = data[2];
                String id_nummer = data[3];

                statement.setString(1, Personalnummer);
                statement.setString(2, Name);

                Date sqlDate = Date.valueOf(geburtsdatum);// Date variable initialization
                statement.setDate(3, sqlDate);

                statement.setString(4, id_nummer);

                statement.executeQuery();

            }


            ResultSet rs = statement.executeQuery("SELECT * FROM Mitarbeiter");
            System.out.println("Mitarbeiter DATA INSERTED:");
            while (rs.next()) {
                System.out.println( rs.getInt("Personalnummer") + "  " + rs.getString("Name") +
                        "  " + rs.getString("geburtsdatum") + "  " + rs.getInt("id_nummer"));
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
