<?php

namespace Live\Collection;

/**
 * Memory collection
 *
 * @package Live\Collection
 */
class FileCollection 
{
    /**
     * Collection data
     *
     * @var array
     */
    protected $data;
    protected $fileName;

    /**
     * Constructor
     */
    public function __construct($fileName)
    {
        $this->data = fopen($fileName, 'w');
        $this->fileName = $fileName;
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $value, $defaultValue = null)
    {
        if ($this->has($value)) {
            return $defaultValue;
        }

        return file_get_contents($this->fileName);
    }

    /**
     * {@inheritDoc}
     */
    public function set(string $value)
    {
        fwrite($this->data, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function has(string $value)
    {
        if ($this->data == $value) {
            return true;
        }
        
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function empty()
    {
        return filesize($this->fileName);
    }

    /**
     * {@inheritDoc}
     */
    public function clean()
    {
        file_put_contents($this->fileName, "");
    }
}
