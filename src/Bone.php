<?php

class Bone
{
    function __construct($faces)
    {
        $this->faces = $faces;
        $this->status = 'normal';
        $this->value = 0;
    }

    /**
     * @return int
     */
    public function getFaces()
    {
        return $this->faces;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    public function roll($val = null)
    {
        $this->value = is_null($val) ? rand(1, $this->faces) : $val;

        switch ($this->value) {
            case 1:
                $this->status = 'min';
                break;
            case $this->faces:
                $this->status = 'max';
                break;
            default:
                $this->status = 'normal';
        }

        return $this;
    }
}
