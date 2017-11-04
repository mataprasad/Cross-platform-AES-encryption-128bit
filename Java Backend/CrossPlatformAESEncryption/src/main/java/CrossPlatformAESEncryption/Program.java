package CrossPlatformAESEncryption;

import CrossPlatformAESEncryption.Helper.CryptoHelper;

public class Program {
    public static void main(String args[])  {
        try{
            String input = "Text to encrypt";
            System.out.println("input:" + input);
            String cipher = CryptoHelper.encrypt(input);
            System.out.println("cipher:" + cipher);
            //cipher = "cSeTlY/nakstEWZ9EOzi2A==";
            //System.out.println("cipher:" + cipher);
            String output = CryptoHelper.decrypt(cipher);
            System.out.println("output:" + output);
        }catch (Exception e){
            e.printStackTrace();
        }
    }
}
