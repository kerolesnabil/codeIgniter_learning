<?php


echo $res;

echo form_open_multipart(base_url("welcome/upload_file"));

echo form_upload('file');

echo form_submit('submit','upload');