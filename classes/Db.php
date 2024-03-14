<?php
class Db
{
    private $pathToCsv;

    public function __construct($pathToCsv)
    {
        $this->pathToCsv = $pathToCsv;
    }

    public function getPathToCsv()
    {
        return $this->pathToCsv;
    }

    public function setPathToCsv($pathToCsv)
    {
        $this->pathToCsv = $pathToCsv;
    }

    public function readCsv()
    {
        return fopen($this->pathToCsv, 'r');
    }

    public function openCsv()
    {
        return fopen($this->pathToCsv, 'ab');
    }

    public function writeIntoCsv($file, $arrayToWrite)
    {
        if (!is_resource($file)) {
            trigger_error("Le fichier CSV n'a pas pu être ouvert en mode écriture.", E_USER_ERROR);
            return;
        }

        fputcsv($file, $arrayToWrite);
    }


    public function closeCsv($file)
    {
        fclose($file);
    }

    public function readFromCsv()
    {
        $data = [];
        $csv = $this->readCsv();

        if ($csv !== false) {
            while (($row = fgetcsv($csv)) !== false) {
                $data[] = $row;
            }

            $this->closeCsv($csv);
        }

        return $data;
    }
    public function deleteFromCsv($index) {
        $data = $this->readFromCsv();
        if (isset($data[$index])) {
            unset($data[$index]);
        }
        $file = $this->openCsv();
        $this->writeIntoCsv($file, $data);
        $this->closeCsv($file);
    }

    public function updateIntoCsv($file, $data, $index)
    {
        if (($handle = fopen($file, 'c')) !== false) {
            flock($handle, LOCK_EX);
    
            $row = [];
            foreach ($data as $value) {
                $row[] = '"' . str_replace('"', '""', $value) . '"';
            }
            $row = implode(',', $row) . "\n";
    
            $tempFile = tempnam(sys_get_temp_dir(), 'csv');
            $tempHandle = fopen($tempFile, 'w');
    
            fseek($handle, 0);
            $lineNumber = 0;
            while (($line = fgets($handle)) !== false) {
                if ($lineNumber == $index) {
                    fwrite($tempHandle, $row);
                } else {
                    fwrite($tempHandle, $line);
                }
                $lineNumber++;
            }
    
            fclose($tempHandle);
            fclose($handle);
    
            rename($tempFile, $file);
    
            return true;
        }
    
        return false;
    }
    

}
