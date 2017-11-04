package org.crossplatformaesencryption;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import org.crossplatformaesencryption.helper.CryptoHelper;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

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
