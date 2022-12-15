package com.company;
import java.sql.*;
import java.io.*;
public class Kassierer_insert{
    public static void main(String[] args) {
        String jdbcURL = "jdbc:oracle:thin:@oracle-lab.cs.univie.ac.at:1521:lab";
        String username = "a01642049";
        String password = "dbs20";

        String csvFilePath = "B:\\Mozila downloads\\Kassierer_5k.csv";


        Connection connection = null;

        try {

            connection = DriverManager.getConnection(jdbcURL, username, password);

            String sql = "INSERT INTO Kassierer (SV_nummer, Gehalt, email, Personalnummer) VALUES (?, ?, ?, ?)";
            PreparedStatement statement = connection.prepareStatement(sql);

            BufferedReader lineReader = new BufferedReader(new FileReader(csvFilePath));
            String lineText = null;


            lineReader.readLine(); // skip header line

            while ((lineText = lineReader.readLine()) != null) {
                String[] data = lineText.split(",");
                String SV_nummer = data[0];
                String Gehalt = data[1];
                String email = data[2];
                String Personalnummer = data[3];

                statement.setString(1, SV_nummer);
                statement.setString(2, Gehalt);
                statement.setString(3, email);
                statement.setString(4, Personalnummer);

                statement.executeQuery();

            }


            ResultSet rs = statement.executeQuery("SELECT * FROM Kassierer");
            System.out.println("KASSIERER DATA INSERTED:");
            while (rs.next()) {
                System.out.println( rs.getInt("SV_nummer") + "  " + rs.getInt("Gehalt") +
                        "  " + rs.getString("email") + "  " + rs.getInt("Personalnummer"));
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
