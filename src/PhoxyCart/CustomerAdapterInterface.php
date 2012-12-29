<?php

namespace PhoxyCart;

interface CustomerAdapterInterface
{
    public function getCustomerList();
    public function getCustomer($email);
    public function createCustomer($email, $hash, $salt);
}
