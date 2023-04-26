<?php

function GenerateToken()
{
    return hash("sha256", rand());
}
