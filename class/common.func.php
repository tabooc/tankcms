<?php

/*
 * 项目函数库
 */

//检测登陆
function checklogin($node = 'default', $backurl = 'default') {

    //未登录
    $jump = '';
    if (empty($_SESSION["username"])) {
        $jump = 'login.php';
        jump($jump);
        exit;
    }
    //超级管理员组无需验证节点权限
    if ($_SESSION['usertype'] == 1) {
        return true;
    }
    $authnode = new AuthNode();
    $result = $authnode->getid($node);
    if ($result->num_rows > 0) {

        $data = $result->fetch_assoc();

        $node = explode(',', $_SESSION['grouplist']);
        if (in_array($data['id'], $node)) {

            return true;
        } else {
            infoWindow('没有权限！', $backurl . '.php');
            return false;
        }
    } else {
        infoWindow('节点不存在！', $backurl . '.php');
        return false;
    }
}

//检查权限
function checkAuth() {
    if (empty($_SESSION['usertype']) || $_SESSION['usertype'] != 1) {
        jump('index.php');
    }
}

function checkSession() {
    if (!empty($_SESSION['username'])) {
        jump('index.php');
    }
}

//跳转
function jump($path, $path2 = 1, $type = 1, $msg = '') {
    switch ($type) {
        case 1:
            $url = header("location:$path");
            exit;
            break;
        case 2:
            $url = "<script type='text/javascript'>window.location.href=main.php?action=$path&page=$path2</script>";
            break;
        case 3:
            $url = "<script type='text/javascript'>window.location.reload()</script>";
            break;
        default:
            $url = header("location:$path");
            exit;
            break;
    }
    return $url;
}

function infoWindow($info, $url, $sec = 3) {
    header("location:msg.php?msg=$info&url=$url&sec=$sec");
    exit;
}

/*
 * 分页函数
 * @action 当前操作名
 * @page  当前页
 * @total 总条目数
 * @pagesiez 每页条数
 * @pagelen 偏移量
 */

function pagesfun($action, $page, $total, $pagesize = 9, $pagelen = 9) {
    $pagecode = ''; //定义变量，存放分页生成的HTML
    $page = intval($page); //避免非数字页码
    $total = intval($total); //保证总记录数值类型正确
    if (!$total)
        return array(); //总记录数为零返回空数组
    $pages = ceil($total / $pagesize); //计算总分页
//处理页码合法性
    if ($page < 1)
        $page = 1;
    if ($page > $pages)
        $page = $pages;
//计算查询偏移量
    $offset = $pagesize * ($page - 1);
//页码范围计算
    $init = 1; //起始页码数
    $max = $pages; //结束页码数
    $pagelen = ($pagelen % 2) ? $pagelen : $pagelen + 1; //页码个数
    $pageoffset = ($pagelen - 1) / 2; //页码个数左右偏移量
//生成html
    $pagecode.="<span>$page/$pages</span>"; //第几页,共几页
//如果是第一页，则不显示第一页和上一页的连接
    if ($page != 1) {
        $pagecode.="<a href=\"?action=$action&page=1\">首页</a>"; //第一页
        $pagecode.="<a href=\"?action=$action&page=" . ($page - 1) . "\">上一页</a>"; //上一页
    }
//分页数大于页码个数时可以偏移
    if ($pages > $pagelen) {
//如果当前页小于等于左偏移
        if ($page <= $pageoffset) {
            $init = 1;
            $max = $pagelen;
        } else {//如果当前页大于左偏移
//如果当前页码右偏移超出最大分页数
            if ($page + $pageoffset >= $pages + 1) {
                $init = $pages - $pagelen + 1;
            } else {
//左右偏移都存在时的计算
                $init = $page - $pageoffset;
                $max = $page + $pageoffset;
            }
        }
    }
//生成html
    for ($i = $init; $i <= $max; $i++) {
        if ($i == $page) {
            $pagecode.='<strong>' . $i . '</strong>';
        } else {
            $pagecode.="<a href=\"?action=$action&page={$i}\">$i</a>";
        }
    }
    if ($page != $pages) {
        $pagecode.="<a href=\"?action=$action&page=" . ($page + 1) . "\">下一页</a>"; //下一页
        $pagecode.="<a href=\"?action=$action&page={$pages}\">尾页</a>"; //最后一页
    }
    return array('pagecode' => $pagecode, 'sqllimit' => ' limit ' . $offset . ',' . $pagesize);
}

function msgmagess($str1) {
    echo "<script>alert('$str1');</script>";
}

//输出安全的html
function h($text, $tags = null) {
    $text = trim($text);
    //完全过滤注释
    $text = preg_replace('/<!--?.*-->/', '', $text);
    //完全过滤动态代码
    $text = preg_replace('/<\?|\?' . '>/', '', $text);
    //完全过滤js
    $text = preg_replace('/<script?.*\/script>/', '', $text);

    $text = str_replace('[', '&#091;', $text);
    $text = str_replace(']', '&#093;', $text);
    $text = str_replace('|', '&#124;', $text);
    //过滤换行符
    $text = preg_replace('/\r?\n/', '', $text);
    //br
    $text = preg_replace('/<br(\s\/)?' . '>/i', '[br]', $text);
    $text = preg_replace('/(\[br\]\s*){10,}/i', '[br]', $text);
    //过滤危险的属性，如：过滤on事件lang js
    while (preg_match('/(<[^><]+)( lang|on|action|background|codebase|dynsrc|lowsrc)[^><]+/i', $text, $mat)) {
        $text = str_replace($mat[0], $mat[1], $text);
    }
    while (preg_match('/(<[^><]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^><]*)/i', $text, $mat)) {
        $text = str_replace($mat[0], $mat[1] . $mat[3], $text);
    }
    if (empty($tags)) {
        $tags = 'table|td|th|tr|i|b|u|strong|img|p|br|div|strong|em|ul|ol|li|dl|dd|dt|a';
    }
    //允许的HTML标签
    $text = preg_replace('/<(' . $tags . ')( [^><\[\]]*)>/i', '[\1\2]', $text);
    //过滤多余html
    $text = preg_replace('/<\/?(html|head|meta|link|base|basefont|body|bgsound|title|style|script|form|iframe|frame|frameset|applet|id|ilayer|layer|name|script|style|xml)[^><]*>/i', '', $text);
    //过滤合法的html标签
    while (preg_match('/<([a-z]+)[^><\[\]]*>[^><]*<\/\1>/i', $text, $mat)) {
        $text = str_replace($mat[0], str_replace('>', ']', str_replace('<', '[', $mat[0])), $text);
    }
    //转换引号
    while (preg_match('/(\[[^\[\]]*=\s*)(\"|\')([^\2=\[\]]+)\2([^\[\]]*\])/i', $text, $mat)) {
        $text = str_replace($mat[0], $mat[1] . '|' . $mat[3] . '|' . $mat[4], $text);
    }
    //过滤错误的单个引号
    while (preg_match('/\[[^\[\]]*(\"|\')[^\[\]]*\]/i', $text, $mat)) {
        $text = str_replace($mat[0], str_replace($mat[1], '', $mat[0]), $text);
    }
    //转换其它所有不合法的 < >
    $text = str_replace('<', '&lt;', $text);
    $text = str_replace('>', '&gt;', $text);
    $text = str_replace('"', '&quot;', $text);
    //反转换
    $text = str_replace('[', '<', $text);
    $text = str_replace(']', '>', $text);
    $text = str_replace('|', '"', $text);
    //过滤多余空格
    $text = str_replace('  ', ' ', $text);
    return $text;
}

/* --清除html格式-- */

function clearhtml($content) {
    $content = trim($content);
    $content = strip_tags($content, "");
    $content = ereg_replace("\t", "", $content);
    $content = ereg_replace("\r\n", "", $content);
    $content = ereg_replace("\r", "", $content);
    $content = ereg_replace("\n", "", $content);
    $content = ereg_replace(" ", " ", $content);
    return trim($content);
}

/* --转化为html格式-- */

function likepre($string) {
    $string = trim($string);
    $string = str_replace('"', '&quot;', $string);
    $string = str_replace("'", '&#39;', $string);
    $string = str_replace("<", "&lt;", $string);
    $string = str_replace(">", "&gt;", $string);
    $string = str_replace("\t", "　", $string);  //换为全角空格
    $string = str_replace("   ", "　", $string);  //两个半角空格换为全角空格
    $string = str_replace("\n", "<br/>", $string); //将换行替换成<br>
    return $string;
}

/* 清除标签 */

function skiptags($document) {
    $str = stripslashes($document);

    $str = preg_replace("/\s+/", ' ', $str); //过滤多余回车
    $str = preg_replace("/<[ ]+/si", '<', $str); //过滤<__("<"号后面带空格)

    $str = preg_replace("/<\!--.*?-->/si", '', $str); //注释
    $str = preg_replace("/<(\!.*?)>/si", '', $str); //过滤DOCTYPE
    $str = preg_replace("/<(\/?html.*?)>/si", '', $str); //过滤html标签
    $str = preg_replace("/<(\/?head.*?)>/si", '', $str); //过滤head标签
    $str = preg_replace("/<(\/?meta.*?)>/si", '', $str); //过滤meta标签
    $str = preg_replace("/<(\/?body.*?)>/si", '', $str); //过滤body标签
    $str = preg_replace("/<(\/?link.*?)>/si", '', $str); //过滤link标签
    $str = preg_replace("/<(\/?form.*?)>/si", '', $str); //过滤form标签
    $str = preg_replace("/cookie/si", "COOKIE", $str); //过滤COOKIE标签

    $str = preg_replace("/<(applet.*?)>(.*?)<(\/applet.*?)>/si", '', $str); //过滤applet标签
    $str = preg_replace("/<(\/?applet.*?)>/si", '', $str); //过滤applet标签

    $str = preg_replace("/<(style.*?)>(.*?)<(\/style.*?)>/si", '', $str); //过滤style标签
    $str = preg_replace("/<(\/?style.*?)>/si", '', $str); //过滤style标签

    $str = preg_replace("/<(title.*?)>(.*?)<(\/title.*?)>/si", '', $str); //过滤title标签
    $str = preg_replace("/<(\/?title.*?)>/si", '', $str); //过滤title标签

    $str = preg_replace("/<(object.*?)>(.*?)<(\/object.*?)>/si", '', $str); //过滤object标签
    $str = preg_replace("/<(\/?objec.*?)>/si", '', $str); //过滤object标签

    $str = preg_replace("/<(noframes.*?)>(.*?)<(\/noframes.*?)>/si", '', $str); //过滤noframes标签
    $str = preg_replace("/<(\/?noframes.*?)>/si", '', $str); //过滤noframes标签

    $str = preg_replace("/<(i?frame.*?)>(.*?)<(\/i?frame.*?)>/si", '', $str); //过滤frame标签
    $str = preg_replace("/<(\/?i?frame.*?)>/si", '', $str); //过滤frame标签

    $str = preg_replace("/<(script.*?)>(.*?)<(\/script.*?)>/si", '', $str); //过滤script标签
    $str = preg_replace("/<(\/?script.*?)>/si", '', $str); //过滤script标签
    $str = preg_replace("/javascript/si", "JAVASCRIPT", $str); //过滤script标签
    $str = preg_replace("/vbscript/si", "VBSCRIPT", $str); //过滤script标签
    $str = preg_replace("/on([a-z]+)\s*=/si", "ON\\1=", $str); //过滤script标签
    $str = preg_replace("/&#/si", "&＃", $str); //过滤script标签，如javAsCript:alert('aabb)

    $str = filter_word(addslashes($str));
    return($str);
}

/* -敏感词过滤- */

function filter_word($in) {
    $content = $in;
    //要过滤词语使用|分割
    $replaceStr = '裸聊|插B|操B|李大师|共军|共狗|共党|共匪|专制|贾庆林|吴官正|罗干|黄菊|曾庆红|吴邦国|温家宝|张丕林|张五常|猫肉|骗局|自焚|宋祖英|文字狱|于幼军|黄丽满|李岚清|尉健行|人大|高干|司法警官|李远哲|暴乱|暴动|坐台|妈个|夜总会|黑社会|邓小平|新疆独立|疆独|西藏独立|藏独|台湾独立|魏京生|胡锦涛|李瑞环|李长春|朱镕基|朱容基|江泽民|李鹏|柴玲|王丹|台独|六四|民运|打倒|伦公|伦功|伦攻|论公|论功|论攻|沦攻|沦公|沦功|轮攻|轮公|轮功|发伦|发沦|发论|发轮|法伦|法沦|法论|法轮|红智|洪智|红志|洪志|明慧|真善忍|大纪元|大法|大鸡巴|你妈逼|避孕套|阴毛|龟头|下体|阴门|阴户|屁眼|口交|射精|干他|干她|干你|插他|插她|插你|插我|捅我|捅你|睾丸|阴囊|荡妇|肉洞|肉棒|肉棍|阴蒂|阴道|肛门|开苞|阳具|阴茎|鸡巴|做爱|作爱|造爱|打炮|同房|哥痛|哥疼|姐痛|姐疼|弟痛|弟疼|妹痛|妹疼|变态|爽死|私处|底裤|内裤|胸罩|色狼|吹萧|自慰|行房|吐血|三级|麻衣|激情|虐待|菱恝|夜勤病栋|風花|櫻井|1Pondo|一本道|無修正|更衣|偷拍|母子|乱伦|限制|連發|近親|調教|薄格|臭作|少妇|内射|群射|肛交|潮吹|丝袜|捆绑|18禁|自摸|美腿|肉欲|情色|走光|援交|亚热|制服|上床|叫床|偷情|波霸|露毛|露点|叶子楣|群交|兽交|狂干|幼交|精液|破处|口技|强暴|小穴|喷精|A级|A片|护士|猛插|无毛|学生妹|武藤蘭|慰安妇|伊東|三浦愛佳|金澤文子|大澤惠|夕樹舞子|朝河蘭|及川奈央|星崎未來|飯島愛|小澤園|草莓牛奶|川島和津實|長瀨愛|小泽圆|阴唇|暴干|凌辱|武腾兰|喷尿|肉蒲团|婊子|色友|乱交|强奸|小泽玛莉亚|女優|multimedia|porn|(sm)|[sm]|(av)|[av]|(hz)|[hz]|hentai|xxx|zhuanfalun|zhenshanren|zhengjianwang|zhengjian|yuming|xinsheng|wstaiji|wangce|voa|ustibet|unixbox|UltraSurf|triangleboy|triangle|tibetalk|taip|svdc|safeweb|rfa|renmingbao|renminbao|playboy|peacehall|paper|nmis|naive|nacb|minghuinews|minghui|making|lihongzhi|jiangdongriji|incest|hypermart|huanet|hrichina|hongzhi|GCD|fuck|freenet|freechina|flg|falundafa|falu|dpp|dfdz|dajiyuan|dafa|creaders|cnd|chinesenewsnet|chinamz|chinaliberal|boxun|bignews|cdjp|tianwang|falun|shit|bitch|傻逼|煞笔|傻比|大煞笔|大傻逼|他妈的|操你妈|草你妹|操你|草你祖宗|操你祖宗';
    //过滤
    $content = preg_replace("/$replaceStr/i", "**", $content);
    return $content;
}

//获取客户端IP
function get_client_ip() {
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
        $ip = getenv("REMOTE_ADDR");
    else if (isset($_SERVER ['REMOTE_ADDR']) && $_SERVER ['REMOTE_ADDR'] && strcasecmp($_SERVER ['REMOTE_ADDR'], "unknown"))
        $ip = $_SERVER ['REMOTE_ADDR'];
    else
        $ip = "unknown";
    return ($ip);
}

/**
  +----------------------------------------------------------
 * 产生随机字串，可用来自动生成密码
 * 默认长度6位 字母和数字混合 支持中文
  +----------------------------------------------------------
 * @param string $len 长度
 * @param string $type 字串类型
 * 0 字母 1 数字 其它 混合
 * @param string $addChars 额外字符
  +----------------------------------------------------------
 * @return string
  +----------------------------------------------------------
 */
function rand_string($len = 6, $type = '', $addChars = '') {
    $str = '';
    switch ($type) {
        case 0 :
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . $addChars;
            break;
        case 1 :
            $chars = str_repeat('0123456789', 3);
            break;
        case 2 :
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . $addChars;
            break;
        case 3 :
            $chars = 'abcdefghijklmnopqrstuvwxyz' . $addChars;
            break;
        default :
            // 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
            $chars = 'ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789' . $addChars;
            break;
    }
    if ($len > 10) { //位数过长重复字符串一定次数
        $chars = $type == 1 ? str_repeat($chars, $len) : str_repeat($chars, 5);
    }
    if ($type != 4) {
        $chars = str_shuffle($chars);
        $str = substr($chars, 0, $len);
    } else {
        // 中文随机字
        for ($i = 0; $i < $len; $i++) {
            $str .= msubstr($chars, floor(mt_rand(0, mb_strlen($chars, 'utf-8') - 1)), 1);
        }
    }
    return $str;
}

//加密
function pwdHash($password, $type = 'md5') {
    return hash($type, $password);
}

?>