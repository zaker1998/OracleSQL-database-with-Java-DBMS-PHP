package com.company;
import java.sql.*;
import java.io.*;
public class Manager_insert{
    public static void main(String[] args) {
        String jdbcURL = "jdbc:oracle:thin:@oracle-lab.cs.univie.ac.at:1521:lab";
        String username = "a01642049";
        String password = "dbs20";

        String csvFilePath = "B:\\Mozila downloads\\Manager_5k.csv";


        Connection connection = null;

        try {

            connection = DriverManager.getConnection(jdbcURL, username, password);

            String sql = "INSERT INTO Manager (Mitarbeiter_nummer, Pflichten, Personalnummer, Telefonnummer) VALUES (?, ?, ?, ?)";
            PreparedStatement statement = connection.prepareStatement(sql);

            BufferedReader lineReader = new BufferedReader(new FileReader(csvFilePath));
            String lineText = null;


            lineReader.readLine(); // skip header line

            while ((lineText = lineReader.readLine()) != null) {
                String[] data = lineText.split(",");
                String Mitarbeiter_nummer = data[0];
                String Pflichten = data[1];
                String Personalnummer = data[2];
                String Telefonnummer = data[3];

                statement.setString(1, Mitarbeiter_nummer);
                statement.setString(2, Pflichten);
                statement.setString(3, Personalnummer);
                statement.setString(4, Telefonnummer);

                statement.executeQuery();

            }


            ResultSet rs = statement.executeQuery("SELECT * FROM Manager");
            System.out.println("MANAGER DATA INSERTED:");
            while (rs.next()) {
                System.out.println( rs.getInt("Mitarbeiter_nummer") + "  " + rs.getString("Pflichten") +
                        "  " + rs.getInt("Personalnummer") + "  " + rs.getInt("Telefonnummer"));
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
