<?php

class Chat
{

    public function readline(): string
    {
        return rtrim(fgets(STDIN));
    }

}
