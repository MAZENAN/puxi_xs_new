<?php


class PaperController extends HomeController {

    public function indexAction(){
        $this->doact('*');
        $id = IGet('id');
        if (!$id) {
            $this->display('index.tpl');return;
        }
        $paper = DB::getone('select * from @pf_periodical_paper where id=? and allow = 1',array($id));
        $paperImgs = json_decode($paper['images']);
        $collect = false;
        if (!empty($this->userid)){
            $row = DB::getone('select id from @pf_collection_paper where user_id = ? and paper_id=?',array($this->userid,$id));
            if ($row)
                $collect = true;
        }
        Config::load('upload');
        $domain = C('aliyunOss')['get_domain'];
        $this->assign(compact('paper','paperImgs','collect','domain'));
        $this->display('paper.tpl');
    }

    public function catalogAjaxAction() {
        $year = IGet('year');
        $id = IGet('id');
        $phase = IGet('phase');
        $docid =DB::getone('select id from @pf_document where periodical_id=? and year=? and phase =? and allow=1',array($id,$year,$phase));
        $catalogs = [];
        $message = '';
        if ($docid) {
            $catalogs = DB::getlist('select title,id,authors from @pf_periodical_paper where document_id=?',array($docid['id']));
            $message = 'ok';
        }
        $this->returnJson(['message'=>$message,'data'=>$catalogs]);
    }

    public function collectAjaxPostAction(){
        $this->islogin();
        $paperId = IPost('id');
        $vals = [];
        $vals['user_id'] =  $this->userid;
        $vals['paper_id'] =  $paperId;
        $vals['add_time'] = date('Y-m-d H:i:s');
        DB::insert('@pf_collection_paper',$vals);
        if(DB::lastId());
        $this->returnJson(['code'=>'1']);
    }

    public function unCollectAjaxPostAction() {
        $this->islogin();
        $cid = IPost('id');
        DB::delete('@pf_collection_paper','paper_id=? and user_id=?',array($cid,$this->userid));
        $this->returnJson(['code'=>'1']);
    }

    public function downloadAction() {
        $this->islogin();
        Config::load('upload');
        $docName = SGet('docname');
        $file = fopen ( C('aliyunOss')['get_domain']  .$docName, "rb" );

        //告诉浏览器这是一个文件流格式的文件
        Header ( "Content-type: application/octet-stream" );
        //请求范围的度量单位
     //   Header ( "Accept-Ranges: bytes" );
        //Content-Length是指定包含于请求或响应中数据的字节长度
//        Header ( "Accept-Length: " . filesize ( $file_dir . $file_name ) );
        //用来告诉浏览器，文件是可以当做附件被下载，下载后的文件名称为$file_name该变量的值。
        Header ( "Content-Disposition: attachment; filename=" . $docName );

        //读取文件内容并直接输出到浏览器
        echo fread ( $file, filesize ( C('aliyunOss')['get_domain']  .$docName ) );
        fclose ( $file );
        exit ();
    }
}