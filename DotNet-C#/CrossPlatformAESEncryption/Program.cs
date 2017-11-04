using CrossPlatformAESEncryption.Helper;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace CrossPlatformAESEncryption
{
    class Program
    {
        static void Main(string[] args)
        {
            String input = "Text to encrypt";
            Console.WriteLine("input:" + input);
            String cipher = CryptoHelper.Encrypt(input);
            Console.WriteLine("cipher:" + cipher);
            //cipher = "kb1TyFRUcMaY6Z1vCRravA==";
            //Console.WriteLine("cipher:" + cipher);
            String output = CryptoHelper.Decrypt(cipher);
            Console.WriteLine("output:" + output);
            Console.ReadLine();
        }
    }
}
