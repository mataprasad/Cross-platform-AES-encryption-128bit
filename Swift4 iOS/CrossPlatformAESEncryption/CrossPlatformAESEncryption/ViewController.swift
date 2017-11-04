//
//  ViewController.swift
//  CrossPlatformAESEncryption
//
//  Created by Mata Prasad Chauhan on 01/11/17.
//  Copyright © 2017 Mata Prasad Chauhan. All rights reserved.
//

import UIKit

class ViewController: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()
        let input:String = "Text to encrypt";
        debugPrint("input:" + input);
        let cipher:String = CryptoHelper.encrypt(input:input)!;
        debugPrint("cipher:" + cipher);
        //cipher = "kb1TyFRUcMaY6Z1vCRravA==";
        //debugPrint("cipher:" + cipher);
        let output:String = CryptoHelper.decrypt(input:cipher)!;
        debugPrint("output:" + output);
    }
}

