<?php
namespace application\models;

use application\core\Model;

class Comment extends Model{
    public function getCommentsByMessageId($messageId) {
        $params = [
            'messageId' => $messageId,
        ];
        return $this->db->row('SELECT comment.text_comment,comment.id, user.login FROM comment LEFT JOIN user ON user.id=comment.author_id WHERE message_id = :messageId', $params);
    }
    public function getCommentsById($CommentsId) {
        $params = [
            'id' => $CommentsId,
        ];
        return $this->db->row('SELECT * FROM comment  WHERE id = :id', $params);
    }
    public function addComment($author, $content,$message_id) {
        $params = [
            'author' => $author,
            'text_comment' => $content,
            'message_id' => $message_id
        ];
        $this->db->query('INSERT INTO comment (`author_id`, `text_comment`, `message_id`) VALUES (:author, :text_comment, :message_id)', $params);
        return $this->db->lastInsertId();
    }
    public function updateComment($commentId, $newContent) {
        $params = [
            'id' => $commentId,
            'text_comment' => $newContent,
        ];
        $this->db->query('UPDATE comment SET text_comment = :text_comment WHERE id = :id', $params);
    }
    public function deleteComment($id) {
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM message WHERE id = :id', $params);
	}
}

