<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Shahar
 */
interface IUser {
    function InsertUser($username, $email, $password);
    function IsValidLogin($username, $password);
    function IsUserExists($username);
    //function IsPasswordCorrect($username, $password);
}
