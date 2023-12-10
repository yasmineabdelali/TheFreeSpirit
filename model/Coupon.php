<?php
class Coupon
{
    public ?int $id_coupon = null;
    public int $id_command;
    public string $code_coupon;

    public function __construct($id_coupon, $id_command, $code_coupon)
    {
        $this->id_coupon = $id_coupon;
        $this->id_command = $id_command;
        $this->code_coupon = $code_coupon;
    }

    public function getId_coupon()
    {
        return $this->id_coupon;
    }

    public function setId_command($id_command)
    {
        $this->id_command = $id_command;
        return $this;
    }

    public function getId_command()
    {
        return $this->id_command;
    }

    public function setCode_coupon($code_coupon)
    {
        $this->code_coupon = $code_coupon;
        return $this;
    }

    public function getCode_coupon()
    {
        return $this->code_coupon;
    }
}



