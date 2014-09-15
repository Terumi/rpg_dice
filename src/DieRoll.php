<?php

use \Bone;

class DieRoll
{

    public function roll($description)
    {
        $explanation = $this->explain($description);
        $sum = 0;
        if (isset($explanation[0])) {
            $times = $explanation[0];
            $faces = $explanation[1];
            if (isset($explanation[2])) {
                $sum = $explanation[2];
            }

            foreach (range(1, $times) as $i) {
                $sum += $this->roll_a_die($faces);
            }


            return $sum;
        }

        return [];

    }

    public function explain($description)
    {
        if ($description == '')
            return [];
        $die_number = explode('d', $description, 2);
        $drm = explode('+', $die_number[1], 2);

        foreach (["-", "+"] as $sign) {
            $drm = explode($sign, $die_number[1], 2);
            if (count($drm) > 1) {
                return [(int)$die_number[0], (int)$drm[0], (int)($sign . $drm[1])];
            }
        }

        return [(int)$die_number[0], (int)$die_number[1]];
    }

    /**
     * @return int
     */
    public function roll_a_die($faces)
    {
        $die = new Bone($faces);
        $die->roll();
        return $die->getValue();
    }
}
