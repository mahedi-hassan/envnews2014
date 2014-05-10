<?php

// php /home/path/protected/yiic.php cron
// php /home/envnews/public_html/protected/yiic.php cron
class CronCommand extends CConsoleCommand {

    /**
     * Send mail method BCC
     */
    public static function sendMailBCC($to, $subject, $message, $fromName, $fromMail, $bccList) {
        $headers = "From: " . $fromName . "<" . $fromMail . "> \r\nX-Mailer: php\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        $headers .= "Bcc: $bccList\r\n";
        $to = $fromMail;
        $message = wordwrap($message, 70);
        $message = str_replace("\n.", "\n..", $message);
        return mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);
    }

    /**
     * Send mail method
     */
    public static function sendMail($to, $subject, $message, $fromName, $fromMail) {
        $headers = "From: " . $fromName . "<" . $fromMail . "> \r\nX-Mailer: php\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        $to = $to;
        $message = wordwrap($message, 70);
        $message = str_replace("\n.", "\n..", $message);
        return mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);
    }

    public function getCategories($cats) {
        $ex = explode(',', $cats);
        $vals = '';
        for ($i = 0; $i < count($ex); $i++) {
            $childcat = Yii::app()->db->createCommand()
                    ->select('id')
                    ->from('{{news_category}}')
                    ->where('parent_id=' . $ex[$i])
                    ->queryAll();
            foreach ($childcat as $keys => $values) {
                $vals .= $values['id'] . ',';
            }
        }
        $vals = substr_replace($vals, "", -1);
        $exval = explode(',', $vals);
        $impval = implode(',', $exval);

        return $impval;
    }

    public function actionIndex() {
        //get date range
        define('SECONDS_PER_DAY', 86400);
        $start = $days_ago = date('Y-m-d', time() - 2 * SECONDS_PER_DAY);
        $end = date('Y-m-d');

        //Get mail list 
        $mailList = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{user_subscription}}')
                ->where('status=1 AND user_id IS NOT NULL AND categories IS NOT NULL')
                ->queryAll();

        //$bccList = 'saidurwd@gmail.com, shapon.jms@gmail.com, aaratan@gmail.com, chandan_cch@yahoo.com, m.hasan199@yahoo.com';
        foreach ($mailList as $key => $valuess) {
            $categories = $this->getCategories($valuess["categories"]);
            $newsList = Yii::app()->db->createCommand()
                    ->select('id, title, published_date, cat_id, sorc_id')
                    ->from('{{news}}')
                    ->where('state = 1 AND published_date>"' . $start . '" AND published_date<"' . $end . '" AND cat_id IN(' . $categories . ')')
                    //->limit(50)
                    ->order('published_date DESC')
                    ->queryAll();
            if (count($newsList) > 0) {
                $message = '<h1>ENVNEWS</h1><p>Information is Power</p>';
                $message .= 'Dear Subscriber,<br />';
                $message .= 'Greetings from EnvNews! Please find below the latest news feed for today as per your category preference. For more information on category news, book index, upcoming events and many more feature information, please visit our web portal.<br /><br />';
                $message .= '<h2>Latest News</h2>';
                $message .= '<hr />';
                $message .= '<table cellspacing="10">';
                foreach ($newsList as $keys => $values) {
                    $message .= '<tr><td><a href="http://www.envnews.org/news/' . $values['id'] . '.html">' . $values['title'] . '</a></td><td><i>' . date("F j, Y", strtotime($values['published_date'])) . '</i></td><td><strong>Category:</strong> ' . NewsCategory::getNewsCategoryName($values['cat_id']) . '</td><td><strong>Source:</strong> ' . NewsSource::get_source_title($values['sorc_id']) . '</td></tr>';
                }
                $message .= '</table>';
                $message .= '<br /><br />This message was intended for ' . User::getEmail($valuess['user_id']) . '. If you do not wish to receive this type of email from envnews.org in the future, please set your preferences. To update your Mail alert preferences, ' . CHtml::link('click here', 'http://envnews.org/user/update/' . $valuess['user_id'] . '.html');
                //$to = User::getName($valuess["user_id"]) . '<' . User::getEmail($valuess["user_id"]) . '>';
                $to = User::getEmail($valuess['user_id']);
                $subject = 'ENVNEWS.ORG news subscription mail';
                $fromName = 'ENVNEWS.ORG';
                $fromMail = Yii::app()->params['adminEmail'];
                $this->sendMail($to, $subject, $message, $fromName, $fromMail);
            }
        }
    }

}
