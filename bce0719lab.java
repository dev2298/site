package com.company;
import java.lang.IllegalArgumentException;
import java.lang.NumberFormatException;
import java.lang.Character;
import java.util.NoSuchElementException;
import java.util.Scanner;




public class bce0719lab {

    public static void check(String reg, String mob) throws IllegalArgumentException,NumberFormatException,NoSuchElementException{
        if(reg.length() != 9  java||  mob.length() != 10) {
            System.out.println("Invalid");
            throw new IllegalArgumentException();
        }
        try{
            long mb = Long.parseLong(mob);
            for (int i = 0; i < reg.length() ; i++) {
                if(!( Character.isDigit(reg.charAt(i)) || ((reg.charAt(i)>=65 && reg.charAt(i)<=90) || (reg.charAt(i)>= 97 && reg.charAt(i)<=122)))){
                    throw new NoSuchElementException();
                }
            }

        }
        catch(Exception e){
            System.out.println("Invalid");
            throw e;
        }

    }


    public static void main(String[] args) {
	// write your code here
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter The register Number ");
        String regNo = sc.next();
        System.out.println("Enter Mobile number ");
        String mobNo= sc.next();
        try {
            check(regNo, mobNo);
            System.out.println("Valid");
        }catch (NumberFormatException nfe){
            System.out.println("Number Format Exception");
            System.out.println(nfe);
        }
        catch(IllegalArgumentException iae){
            System.out.println("Illeagal Argument Exception ");
            System.out.println(iae);
        }catch(NoSuchElementException nse){
            System.out.println("No Such Element Exception ");
            System.out.println(nse);
        }
        catch(Exception e ){
            System.out.println("Exception");
        }
    }
}
