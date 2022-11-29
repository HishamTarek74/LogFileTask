<?php

class Log
{
    /**
     * @constructor
     *
     * @param string $file
     * @param string $start
     * @param integer $paginate
     */
    public function __construct(
        private string $file,
        private string $start,
        private int $paginate = 10,
    ) {}

    /**
     *
     * get file path to convert to an array lines
     * and paginate the file lines
     *
     * @return array
     *
     */
    public function getFileData() : array
    {
        $start = $this->start;
        $paginate = $this->paginate;
        $file = dirname(__DIR__) . '/examples/' . $this->file;

        if (!$this->file || !file_exists($file))
            return [
                'status' => 'error',
                'code'   => '404',
                'message' => "the file not founded !",
            ];
        $lines = file($file);
        $linesCount = count($lines);

        $lastPaginte = ($linesCount - $linesCount % $paginate) + 1;
        $start = $start >= 1 ? $start : 1;
        $start = $start < $linesCount ? $start : $lastPaginte;

        $response = array_splice($lines, $start - 1, $paginate);

        $nextPaginate = $start + $paginate;
        $nextPaginate = $nextPaginate <= $linesCount ? $nextPaginate : $linesCount;

        return [
            'start' => $nextPaginate,
            'previous' => $start - $paginate >= 1 ? $start - $paginate : 0,
            'next' => $nextPaginate,
            'end' => $lastPaginte,
            'total' => $linesCount,
            'status' => 'success',
            'code' => '200',
            'data' => $response,
        ];
    }

}

// new Instance from log to pagination
$log = new Log($_REQUEST['file'], $_REQUEST['start'], $_REQUEST['paginate']);
echo json_encode($log->getFileData());



