简单的问卷调查网站
=============

Language : PHP, Javascript

Database : Mysql

简单的问卷调查网站,导师让做给科研用的一个小练手项目,最后也算用得上~

- [x] 从 Excel 表中导入问卷量表 (使用 PHPExcel 库)
- [x] 自动生成用户至数据库
- [x] 使用 Ajax 跟踪用户问答进度
- [x] 使用 Ajax + jQuery 自动保存用户答题
- [x] 使用 jQuery 检查用户是否答题完毕并且使用标记标注未答完的题目

-------------

几个功能文件的说明:

*importfromexcel.php* : 从 Excel 表中导入问卷量表之入口.请使用 Excel 2007 以上版本.

*include/generate_users.php* : 自动生成用户.

-------------

2015 Kenneth Zhang
[yzo.me](http://yzo.me)