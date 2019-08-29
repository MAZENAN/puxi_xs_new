<?php

/**
 * Class Config
 *
 * Make configurations required by the sample.
 * Users can run RunAll.php which runs all the samples after configuring Endpoint, AccessId, and AccessKey.
 */
Config::load('upload');
final class Config
{
    const OSS_ACCESS_ID = C('AccessKeyID');
    const OSS_ACCESS_KEY =  C('AccessKeySecret');
    const OSS_ENDPOINT = C('domain');
    const OSS_TEST_BUCKET =  C('bucket');
}
