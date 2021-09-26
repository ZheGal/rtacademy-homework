<?php

declare( strict_types=1 );


$cities = new CitiesParser(
    'userfile',
    'Ukraine',
    '/data/cities_ukraine.html'
);

$cities->execute();
$cities->getError();

class CitiesParser
{
    public const MAX_FILE_SIZE = 10485760;

    protected string $_error_message;
    protected string $_upload_file_input_name;
    protected string $_upload_file_tmpname;
    protected string $_selected_country;
    protected array $_cities;
    protected string $_filepath_cities_html; 

    public function __construct( 
        string $upload_file_input_name, 
        string $selected_country, 
        string $filepath_cities_html )
    {
        $this->_upload_file_input_name = $upload_file_input_name;
        $this->_selected_country = $selected_country;
        $this->_filepath_cities_html = $filepath_cities_html;
    }

    protected function _initialize() : self
    {
        $this->_error_message = "";
        return $this;
    }

    protected function _processUploadedFile() : self
    {
        try
        {
            if ( empty($_FILES[$this->_upload_file_input_name]) ) {
                throw new Exception( 'Помилка. Необхідно завантажити файл.' );
            }

            if ( $_FILES[$this->_upload_file_input_name] !== UPLOAD_ERR_OK ) {
                throw new Exception( 'Виникла помилка при завантаженні файлу.' );
            }

            if ( $_FILES[$this->_upload_file_input_name]['type'] != 'text/csv' ) {
                throw new Exception( 'Помилка. Файл повинен мати формат CSV.' );
            }

            if ( $_FILES[$this->_upload_file_input_name]['size'] > self::MAX_FILE_SIZE ) {
                throw new Exception( 'Помилка. Файл повинен бути менше ' . self::MAX_FILE_SIZE . ' байтів.' );
            }
        }
        catch ( Exception $e )
        {
            $this->_error_message = $e->getMessage();
        }

        return $this;
    }

    protected function _getCitiesFromCSVFile() : self
    {

        return $this;
    }

    protected function _sortCitiesByName() : self
    {

        return $this;
    }

    protected function _createCitiesHTMLFile() : self
    {

        return $this;
    }

    protected function _redirectLocation() : self
    {
        
        return $this;
    }

    public function execute() : void
    {
        try
        {
            $this->_initialize();
            $this->_processUploadedFile();
            $this->_getCitiesFromCSVFile();
            $this->_sortCitiesByName();
            $this->_createCitiesHTMLFile();
            $this->_redirectLocation();
        }
        catch( Exception $e )
        {
            $this->_error_message = $e->getMessage();
        }
    }

    public function getError() : string
    {
        return $this->_error_message;
    }
}

require('./view.php');