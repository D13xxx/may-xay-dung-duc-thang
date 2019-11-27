<?php

namespace frontend\models;


class Cart
{
    public function addCart($id, $arrData){
        $session = \Yii::$app->session;
        if (!isset($session['cart'])){
            $cart[$id] = array(
                "proName"=>$arrData["full_name"],
                "price"=>$arrData["price"],
                "avatar"=>$arrData["avatar"],
                "amount"=>1
            );
        }else{
            $cart = $session['cart'];
            if (array_key_first($id,$cart)){
                $cart[$id] = array(
                    "proName"=>$arrData["full_name"],
                    "price"=>$arrData["price"],
                    "avatar"=>$arrData["avatar"],
                    "amount"=>$cart[$id]["amount"]+1
                );
            }else{
                $cart[$id] = array(
                    "proName"=>$arrData["full_name"],
                    "price"=>$arrData["price"],
                    "avatar"=>$arrData["avatar"],
                    "amount"=>$cart[$id]["amount"]
                );
            }
        }
        $session['cart']= $cart;
    }
}