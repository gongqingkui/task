<?php
/* ���ȫ�ֳ��������ļ����
 * ������ֵ��ͨ����̨��������
 * �������ֹ��޸Ĵ��ļ���
 */
//[siteinfo]
session_start();

define("SITE_VERSION","2.0");
define("SITE_BASEURL","http://localhost/PIM/");

define("SITE_NAME","PIM");
define("SITE_COMPANY","Linyi Normal Universtiy");
define("SITE_CONTACT","QQ:410743943 Tel:13954417735 E-mail: gongqignkui@126.com");

//[database]
define("DATA_HOST","localhost");
define("DATA_PORT","3306");
define("DATA_USER","root");
define("DATA_PASS","root");
define("DATA_DB","pim");

//[settings]

//current language
$db = mysql_connect(DATA_HOST,DATA_USER,DATA_PASS);
mysql_select_db(DATA_DB,$db);
$s = mysql_query("select location,skin from users where id =".$_SESSION['SESS_USERID']);
$r = mysql_fetch_assoc($s);
if($r['location'])
{	
	define("LOCATION",$r['location']);
}
elseif(get_cookie("userlocation"))
{
	define("LOCATION",get_cookie("userlocation"));
}else
{
	define("LOCATION","cn");
}

if($r['skin'])
{
	define("CSS",$r['skin']);
}elseif(get_cookie("userskin"))
{
	define("CSS",get_cookie("userskin"));
}else
{
	define("CSS","default");
}

//[menu]
$dic=array("ok"=>array("Ok ","ȷ��","�_��"),
	"advanced"=>array("Advanced ","�߼�","�߼�"),
	"add"=>array("Add ","����","����"),
	"as"=>array("As ","��Ϊ","����"),
	"list"=>array("List ","�б�","�б�"),
	"date"=>array("Date ","����","����"),
	"firstpage"=>array("First Page ","��ҳ","���"),	
	"messages"=>array("Messages ","��Ϣ","��Ӎ"),
	"contanct"=>array("Contanct ","��ϵ��","�M��"),
	"email"=>array("Email ","�����ʼ�","����]��"),
	"edit"=>array("Edit ","�༭","��݋"),
	"error"=>array("Error ","����","�e�`"),
	"calendar"=>array("Calendar ","����","�Օ�"),
	
	"notes"=>array("Notes ","���","��{"),
	"festival"=>array("Festival ","����","����"),
	
	"expense"=>array("Expense ","����","���M"),
	"report"=>array("Report ","����","�R��"),
	"header"=>array("Header ","ͷ��","�^��"),
	"information"=>array("Information ","��Ϣ","��Ϣ"),
	"applications"=>array("Applications ","���","��ʽ"),
	
	"about"=>array("About ","����","�P�"),
	
	"register"=>array("Register ","ע��","�]��"),
	"login"=>array("Login ","��½","���"),
	"logout"=>array("Logout ","ע��","�]�N"),
	"location"=> array("Location ","λ��","λ��"),
	"log"=> array("Log ","��¼","ӛ�"),
	"new"=>array("New ","�½�","�½�"),
	"normal"=>array("Normal ","һ��","һ��"),
	"newStatus"=>array("New Status,Please visited the first page ","������ʾ��������ҳ","������ʾ���L�����"),
	"update"=>array("Update ","�޸�","�޸�"),
	"options"=>array("Options ","ѡ��","�x�"),
	"other"=>array("Ohter ","����","����"),
	"status"=>array("Status ","״̬","��B"),
	"subject"=>array("Subject ","����","���}"),
	"skin"=>array("Skin ","Ƥ��","Ƥ�w"),
	"search"=>array("Search ","����","����"),
	"securityLong"=>array("Please do not select this option when in net bar or public library.","Ϊ��ȷ�������Ϣ��ȫ���벻Ҫ�����ɻ��߹�������ѡ����","���˴_������YӍ��ȫ��Ո��Ҫ�ھW�ɻ��߹����C���x���헡�"),
	"send"=>array("Send ","����","�l��"),
	"tips"=>array("Tips ","��ʾ","��ʾ"),
	"type"=> array("Type ","����","���"),
	"task"=>array("Task ","����","�΄�"),
	"tip"=>array("Tip ","��ʾ","��ʾ"),
	"prevpage"=>array("PrevPage ","ǰһҳ","ǰһ�"),
	"incorrect"=>array("Incorrect ","����","�e�`"),
	"username"=>array("UserName ","�û�","�Ñ�"),
	"password"=>array("PassWord ","����","�ܴa"),
	"inbox"=>array("InBox ","�ռ���","�ռ���"),
	"outbox"=>array("OutBox ","������","�l����"),
	"pagecount"=>array("PageCount ","ҳ��","퓴a"),
	"nextpage"=>array("NextPage ","��һҳ","��һ�"),
	"lastpage"=>array("LastPage ","���һҳ","����һ�"),
	"reply"=>array("Reply ","�ظ�","�؏�"),
	"view"=>array("view ","��ʾ","�@ʾ"),
	"wait"=>array("Wait ","ؽ��","ؽ��"),
	"priority"=>array("Priority ","���ȼ�","�������"),
	"category"=>array("Category ","����","���"));
//PIM 
$locationsarr =array("Home ","Dormitory ","Office ","Road ","Net ","Library");
$typesarr = array("Reminder ","Meeting ","Call ","Birthday ","Anniversary ","Memo");
?>