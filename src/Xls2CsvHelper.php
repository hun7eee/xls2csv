<?php

namespace Xls2Csv;

/**
 * Simple XLS to CSV converter
 * Class Xls2CsvHelper
 */
class Xls2CsvHelper
{
    private $filePath;
    private $fileName;
    private $resultPath;
    private $resultName;

    /**
     * Xls2CsvHelper constructor.
     * @param $filePath
     * @param $fileName
     * @param $resultPath
     * @param $resultName
     */
    function __construct($filePath, $fileName, $resultPath, $resultName)
    {
        $this->filePath = $filePath;
        $this->fileName = $fileName;
        $this->resultPath = $resultPath;
        $this->resultName = $resultName;
    }

    /**
     * @return string full path to result file
     */
    public function convert()
    {
        $command = escapeshellcmd(__DIR__ . '/xls2csv.py');
        $commandString = $command . " '$this->filePath' $this->fileName '$this->resultPath' $this->resultName";
        str_replace('rm', '', $commandString);
        $output = shell_exec($commandString);
        return trim($output);
    }
}