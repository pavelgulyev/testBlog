<?php
namespace application\models;

use application\core\Model;
class Message extends Model
{
    public $error;
    public function postsList($route) {
		$max = 10;
		$params = [
			'max' => $max,
			'start' => ((($route['page'] ?? 1) - 1) * $max),
		];
		return $this->db->row('SELECT * FROM message ORDER BY id DESC LIMIT :start, :max', $params);
	}
	public function postDelete($id) {
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM message WHERE id = :id', $params);
	}
	public function contactValidate($post) {
		$titleLen = iconv_strlen($post['title']);
		$textLen = iconv_strlen($post['Full_contents']);
		if ($titleLen < 3 or $titleLen > 20) {
			$this->error = 'Имя должно содержать от 3 до 20 символов';
			return false;
        
		} elseif ($textLen < 10 or $textLen > 500) {
			$this->error = 'Сообщение должно содержать от 10 до 500 символов';
			return false;
		}
		return true;
	}
    
    public function getMessageById($messageId)
    {
        $params = [
            'id' => $messageId,
        ];
        return $this->db->row('SELECT * FROM message WHERE id = :id', $params);
    }
    public function getMessageCount()
    {
        $sql = "SELECT COUNT(*) as total FROM message";
        $result = $this->db->row($sql);
        return $result[0]['total'];
    }
    public function addMessage($title, $author, $shortContent, $fullContent)
    {
        $params = [
            'title' => $title,
            'author' => $author,
            'Summary' => $shortContent,
            'Full_contents' => $fullContent,
        ];
        var_dump( $params);
        $this->db->query('INSERT INTO message (`title`, `author`, `Summary`, `Full_contents`) VALUES (:title, :author, :Summary, :Full_contents)', $params);
        return $this->db->lastInsertId();
    }

    public function editMessage($messageId, $title, $shortContent, $fullContent,$author)
    {
        $params = [
            'id' => $messageId,
            'title' => $title,
            'author' => $author,
            'Summary' => $shortContent,
            'Full_contents' => $fullContent,
        ];
        $this->db->query('UPDATE message SET title = :title, Summary = :Summary, Full_contents = :Full_contents, author= :author WHERE id = :id', $params);
    }
    public function isPostExists($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM message WHERE id = :id', $params);
	}
}
