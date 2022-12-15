package com.company;

import java.sql.*;
import java.io.*;
public class Main {
    public static void main(String[] args) {
        String jdbcURL = "jdbc:oracle:thin:@oracle-lab.cs.univie.ac.at:1521:lab";
        String username = "a01642049";
        String password = "dbs20";

        String csvFilePath = "B:\\Mozila downloads\\Vermieter.csv";


        Connection connection = null;

        try {

            connection = DriverManager.getConnection(jdbcURL, username, password);

            String sql = "INSERT INTO VERMIETER (AG_nummer, Gruendungsjahr, PLZ, Strasse) VALUES (?, ?, ?, ?)";
            PreparedStatement statement = connection.prepareStatement(sql);

            BufferedReader lineReader = new BufferedReader(new FileReader(csvFilePath));
            String lineText = null;


            lineReader.readLine(); // skip header line

            while ((lineText = lineReader.readLine()) != null) {
                String[] data = lineText.split(",");
                String AG_nummer = data[0];
                String Gruendungsjahr = data[1];
                String PLZ = data[2];
                String Strasse = data[3];

                statement.setString(1, AG_nummer);
                statement.setString(2, Gruendungsjahr);
                statement.setString(3, PLZ);
                statement.setString(4, Strasse);

                statement.executeQuery();

            }


            ResultSet rs = statement.executeQuery("SELECT * FROM VERMIETER");
            System.out.println("VERMIETER DATA INSERTED:");
            while (rs.next()) {
                System.out.println( rs.getInt("AG_nummer") + "  " + rs.getInt("Gruendungsjahr") +
                        "  " + rs.getInt("PLZ") + "  " + rs.getString("Strasse"));
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
