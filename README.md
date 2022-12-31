# LibraryManagement

図書の情報、貸出状況などを管理するツール。

# 環境構築手順
当初は[Heroku](https://jp.heroku.com/)を使用する予定でしたが、完全有料化となってしまったため、ローカルに開発環境を構築することで実行していただく形となります。

※windows10での実行を想定しております。

## 1.  必要ソフトウェア インストール

* 公式ページから**virtual box**をインストール
    * https://www.virtualbox.org/wiki/Downloads
        * **VirtualBox x.x.x platform packages**から**Windows hosts**をクリック
        * ダウンロードしたものを実行し、指示に従ってインストール。

* 公式ページから**vagrant**をインストール
    * https://developer.hashicorp.com/vagrant/downloads
        * **Operating System**のタブから**Windows**を選択
        * **Binary download for Windows**下の**AMD64**で**Download**をクリック
        * ダウンロードしたものを実行し、指示に従ってインストール。

* 公式ページから**git for windows**をインストール
    * https://gitforwindows.org/
        * **We bring the awesome Git SCM to Windows**と書かれた部分の**Download**をクリック

## 2. プロジェクトの起動
* 当ファイル含む展開した**Homesteadフォルダ**を**Cドライブ直下**に配置する。
* フォルダ内にある**ProjectUp.bat**を実行する。
* コマンドプロンプトが閉じたら、http://192.168.10.10 にアクセスする。