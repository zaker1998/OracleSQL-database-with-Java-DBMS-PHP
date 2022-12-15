package com.company;
import java.sql.*;
import java.io.*;
public class Auto_insert{
    public static void main(String[] args) {
        String jdbcURL = "jdbc:oracle:thin:@oracle-lab.cs.univie.ac.at:1521:lab";
        String username = "a01642049";
        String password = "dbs20";

        String csvFilePath = "B:\\Mozila downloads\\Auto.csv";


        Connection connection = null;

        try {

            connection = DriverManager.getConnection(jdbcURL, username, password);

            String sql = "INSERT INTO AUTO (Motorseriennummer, Zertifizierungsnummer, Klasse, Vermietungspreis,id_nummer) VALUES (?, ?, ?, ?, ?)";
            PreparedStatement statement = connection.prepareStatement(sql);

            BufferedReader lineReader = new BufferedReader(new FileReader(csvFilePath));
            String lineText = null;


            lineReader.readLine(); // skip header line

            while ((lineText = lineReader.readLine()) != null) {
                String[] data = lineText.split(",");
                String Motorseriennummer = data[0];
                String Zertifizierungsnummer = data[1];
                String Klasse = data[2];
                String Vermietungspreis = data[3];
                String id_nummer = data[4];

                statement.setString(1, id_nummer);
                statement.setString(2, Zertifizierungsnummer);
                statement.setString(3, Klasse);
                statement.setString(4, Vermietungspreis);
                statement.setString(5, id_nummer);

                statement.executeQuery();

            }


            ResultSet rs = statement.executeQuery("SELECT * FROM AUTO");
            System.out.println("AUTO DATA INSERTED:");
            while (rs.next()) {
                System.out.println( rs.getInt("Motorseriennummer") + "  " + rs.getInt("Zertifizierungsnummer") +
                        "  " + rs.getString("Klasse") + "  " + rs.getInt("Vermietungspreis")+
                        "  " + rs.getInt("Vermietungspreis"));
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
