<?php declare(strict_types = 1);
namespace arhone\storage;

/**
 * Хранилище данных (ключ - значение) (PHP 7)
 *
 * Interface StorageInterface
 * @package arhone\storage
 * @author Алексей Арх <info@arh.one>
 */
interface StorageInterface {

    /**
     * Записывает значение в файл
     *
     * @param string $key
     * @param $data
     * @param int|null $interval
     * @return bool
     */
    public function set (string $key, $data, int $interval = null) : bool ;

    /**
     * Возвращает значение файла
     *
     * @param string $key
     * @return mixed
     */
    public function get (string $key);

    /**
     * Проверяет существует ли ключ
     *
     * @param string $key
     * @return mixed
     */
    public function has (string $key);

    /**
     * Удаление значения
     *
     * @param string $key
     * @return bool
     */
    public function delete (string $key) : bool ;

    /**
     * Задаёт конфигурацию
     *
     * @param array $config
     * @return array
     */
    public function config (array $config) : array;

}