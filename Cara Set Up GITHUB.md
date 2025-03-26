Get started by creating a new file or uploading an existing file. We recommend every repository include a `README`, `LICENSE`, and `.gitignore`.

…or create a new repository on the command line
```
echo "# myrepo" >> README.md
git clone <url>
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/loretoparisi/myrepo.git
git push -u origin master
``` 

…or push an existing repository from the command line
```
git remote add origin https://github.com/loretoparisi/myrepo.git
git pull origin master --allow-unrelated-histories
git commit -a -m "merge"
git push -u origin master
```

…or import code from another repository

You can initialize this repository with code from a Subversion, Mercurial, or TFS project.





cara memasukkan project ke github dan me-remote
git init
git add .
git commit -m "first commit"
git remote add origin <link repo>
git push -u origin master

Periksa daftar remote yang ada dengan perintah git remote -v 
Ketik git remote rm diikuti dengan nama remote yang ingin dihapu


cara push ke github
git branch <nama branch> //buat branch dlu
git checkout <nama branch> //setelah itu pindah ke branch 
git add . //tambah semua file ke staging area
git commit -m "<nama commit>"
git push -u origin <nama branch>

cara pull dari github
git fetch // cek file di github sudah terbaru atau belum (opsional)
git status // cek status commit (opsional)
git pull