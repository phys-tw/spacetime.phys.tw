# `spacetime.phys.tw` 台大物理系系刊《時空》

## Repo 說明

- `vol_XX`: 各屆系刊的網頁跟檔案
- `index.html`: 網站首頁，應該要載入最新的系刊內容（最新是第 `XX` 屆則嵌入 `vol_XX/index.html`）
  - `main.css`: 網站首頁使用的 CSS 檔案（樣式表）
- `style.css`: 許多歷屆系刊網站共用的 CSS 檔案（樣式表）
- `css`, `fonts`, `img`, `js`: 系刊網站共用的各類資源
- `header.html`: 我不知道，看起來是以前的東西
- `CNAME`: 使用 GitHub Pages 時產生的檔案
- `.gitattributes`, `.gitignore`: （不太重要的設定檔，有興趣自己去查）

## 上架方式

網站的首頁在 `/index.html`，
目前使用 iframe 來展示各屆的系刊，並統一將各屆的系刊內容放在 `vol_XX/index.html`。
以下假設要加入第 AA 屆的系刊進行說明，

1. 將系刊內容放到 `vol_AA/` 底下，\
   並確保由 `vol_AA/index.html` 可以連結到該屆系刊的各個頁面。\
   \
   如果以前幾屆（在寫下這篇時，我是第 39 屆幫忙上架的）的格式，\
   你可以參考我的過程這麼做
   1. 得到系刊各部分的 PDF 檔案
   2. 創建 `vol_AA/` 資料夾，並複製那些檔案到 `vol_AA/` 底下（我自己是另外整理進一個 `content` 資料夾）
   3. 參考（複製）過去的檔案，並主要按照目錄頁面的內容更改 `index.html`
      （我自己是以 `vol_37/index.html` 為基礎進行修改的）
   4. 如果該屆有不是 PDF 的檔案，可以參考 `vol_38` 的做法加入頁面（雖然他用 JS 的方式有點微妙）
   5. 比較 `index.html` 跟完整系刊，檢查有沒有遺漏的內容
2. 修改 `/index.html` 頂部（header）的列表，在有一排
   ```html
   <li><a href="#31">31</a></li>
   <li><a href="#32">32</a></li>
   <li><a href="#33">33</a></li>
   ...
   <!-- Add new <li> before this line -->
   ```
   處（底部的註解前）加入連結第 AA 屆系刊內容的一行：`<li><a href="#AA">AA</a></li>`，\
   整體應該看起來像
   ```html
     ...
     <li><a href="#31">31</a></li>
     <li><a href="#32">32</a></li>
     <li><a href="#33">33</a></li>
     ...
     <li><a href="#AA">AA</a></li>
     <!-- Add new <li> before this line -->
   </ul>
   ...
   ```
3. 修改 `/index.html` 中關於最新一期系刊的記錄。\
   將 `const LATEST_VOLUME = ZZ;` （ZZ 應該代表是上一屆系刊的數字）\
   改為 `const LATEST_VOLUME = AA;`
   整體應該像是
   ```js
   ...
    <script>
   const LATEST_VOLUME = AA;
   $(function () {
     ...
   ```
4. `git add` 並 `git commit` 你的修改內容，\
   commit message 可以用 `feat: add vol_AA`
