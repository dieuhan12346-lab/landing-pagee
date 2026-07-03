# LUXORA — CONTENT.md
<!--
  PURPOSE : Single source of truth for all copy, product data, UI strings, and email templates.
  USE     : Every page, component, and email pulls its text from here — edit once, update everywhere.
  FORMAT  : EN (English — default) + VI (Vietnamese — toggle) for all user-facing copy.
  TAGS    : ✅ CONFIRMED | ⚠️ PLACEHOLDER (replace before launch) | 🔧 TECHNICAL (dev notes)
-->

---

## 0. MASTER SETTINGS

```
Site name       : Luxora
Tagline         : Smarter Finance, Stronger Business
Domain          : ⚠️ PLACEHOLDER — e.g. luxorasystem.com
Support email   : luxora@luxorasystem.com
Default language: English (EN)
Second language : Vietnamese (VI)
Default currency: USD
Second currency : VND
VND rate source : 🔧 https://open.er-api.com/v6/latest/USD  →  rates.VND
VND rate display: "1 USD ≈ {rate} VND  ·  Updated live"
VND rate fallback: 25,500 (used if API fails)
Logo file       : /assets/logo.png  (✅ provided — .png)
Favicon         : /assets/favicon.ico  (⚠️ PLACEHOLDER)
OG image        : /assets/og-default.png  (⚠️ PLACEHOLDER — 1200×630px)
```

---

## 1. BRAND

### 1.1 Brand Voice
- **Tone:** Direct, numbers-first, honest. Finance people are skeptical — never over-promise.
- **Voice:** Helpful advisor, not pushy salesperson. Show the result, let the product speak.
- **Social proof strategy:** Product demo outputs, not customer quotes.
  Use real screenshots of the tool working on a demo business — with an honest label.

### 1.2 Tagline Variants
| Use | EN | VI |
|-----|----|----|
| Full | Smarter Finance, Stronger Business | Tài chính thông minh hơn, Doanh nghiệp vững chắc hơn |
| Short | Smarter Finance | Tài chính thông minh |
| Hero sub | Finance tools built for real businesses | Công cụ tài chính cho doanh nghiệp thực tế |

---

## 2. NAVIGATION

### 2.1 Primary Nav Links
| Label EN | Label VI | URL |
|----------|----------|-----|
| Products | Sản phẩm | /catalog |
| Free Tool | Công cụ miễn phí | /tool |
| How It Works | Cách hoạt động | /#how-it-works |
| Support | Hỗ trợ | mailto:luxora@luxorasystem.com |

### 2.2 Nav Controls (right side of header)
```
[Language toggle]   EN  |  VI
[Currency toggle]   USD |  VND
[Cart icon]         /cart            (item count badge)
[Account icon]      /account         label: "My Products" / "Sản phẩm của tôi"
[CTA button]        "See All Products" / "Xem tất cả sản phẩm"  → /catalog
```

### 2.3 Mobile Nav (hamburger)
Same links in drawer. Language + currency toggles at top of drawer.

---

## 3. HOME PAGE  (`/`)

### 3.1 HERO

**EN**
```
EYEBROW : Finance tools for SMEs · Try live · No signup required
H1      : The Finance Tools Your Business Has Been Missing
SUBHEAD : Interactive dashboards and smart spreadsheets —
          try any product live before you buy. No account needed.
CTA 1   : Browse the Catalog  →  /catalog
CTA 2   : Try the Free Tool   →  /tool
TRUST ROW (3 items):
  · 13-week cash visibility  
  · Try before you buy  
  · Instant access after purchase
```

**VI**
```
EYEBROW : Công cụ tài chính cho SME · Dùng thử trực tiếp · Không cần đăng ký
H1      : Công cụ tài chính mà doanh nghiệp bạn đang cần
SUBHEAD : Dashboard và bảng tính thông minh —
          thử trực tiếp bất kỳ sản phẩm nào trước khi mua. Không cần tài khoản.
CTA 1   : Xem tất cả sản phẩm  →  /catalog
CTA 2   : Dùng công cụ miễn phí  →  /tool
TRUST ROW:
  · Nhìn thấy dòng tiền 13 tuần tới
  · Thử trước, mua sau
  · Truy cập ngay sau khi thanh toán
```

---

### 3.2 HOW IT WORKS

**EN**
```
SECTION LABEL : How It Works
H2            : Try it. See it work. Then decide.

STEP 1
  Icon  : 🖥  (or play icon — use SVG)
  Title : Try the live demo
  Body  : Every product has a live, interactive demo you can use right now —
          no signup, no email required.

STEP 2
  Icon  : ✓
  Title : See exactly what you get
  Body  : Watch a short walkthrough video and read what's inside. No guessing
          what you're buying.

STEP 3
  Icon  : 🔒
  Title : Buy and get instant access
  Body  : Pay once. Get your license key, file link, or dashboard copy
          delivered to your inbox and saved in your account.
```

**VI**
```
SECTION LABEL : Cách hoạt động
H2            : Thử trước. Thấy kết quả. Rồi quyết định.

STEP 1
  Title : Dùng thử demo trực tiếp
  Body  : Mỗi sản phẩm đều có demo tương tác ngay trên trang —
          không cần đăng ký, không cần email.

STEP 2
  Title : Xem chi tiết những gì bạn nhận được
  Body  : Xem video hướng dẫn ngắn và danh sách nội dung cụ thể.
          Không đoán mò về sản phẩm bạn đang mua.

STEP 3
  Title : Mua và truy cập ngay lập tức
  Body  : Thanh toán một lần. Nhận license key, link file, hoặc bản sao dashboard
          qua email và lưu trong tài khoản của bạn.
```

---

### 3.3 PRODUCT AS PROOF ("See it in action")

> 🔧 Strategy: No fake testimonials. Show the actual product output on a demo business.
> Use a real screenshot from the 13-Week Cash Flow Forecast tool.

**EN**
```
SECTION LABEL : See it in action
H2            : This is what the product actually does.

IMAGE CAPTION : This is the week the model detected [Demo Co.] was about
                to go cash-negative — 4 weeks before it happened.

DISCLAIMER    : Live demo result on a sample business. Not a customer quote.
                The numbers are real outputs from the tool — not projections we made up.

SUPPORTING COPY:
  The 13-Week Cash Flow Forecast flagged Week 9 as critical — when the
  demo company's cash balance would turn negative. The alert triggered
  in Week 5, giving the business owner 4 weeks to act: delay a purchase,
  accelerate a collection, or arrange a credit line.
  That's what this model does.

CTA : Try the demo yourself  →  [product demo section on /products/13-week-cash-flow]
```

**VI**
```
SECTION LABEL : Xem sản phẩm hoạt động
H2            : Đây là kết quả thật từ sản phẩm.

IMAGE CAPTION : Đây là tuần mô hình phát hiện doanh nghiệp mẫu sắp âm tiền —
                trước 4 tuần.

DISCLAIMER    : Kết quả demo trên dữ liệu mẫu. Không phải lời khách hàng.
                Các con số là đầu ra thực từ công cụ — không phải số chúng tôi tự nghĩ ra.

SUPPORTING COPY:
  Mô hình dự báo 13 tuần xác định Tuần 9 là điểm nguy hiểm — khi số dư tiền mặt
  của doanh nghiệp mẫu sẽ chuyển sang âm. Cảnh báo kích hoạt từ Tuần 5,
  cho chủ doanh nghiệp 4 tuần để hành động: trì hoãn một khoản chi,
  đẩy nhanh thu hồi công nợ, hoặc thu xếp hạn mức tín dụng.
  Đó là những gì mô hình này làm được.

CTA : Tự mình thử demo  →  [product demo section]
```

---

### 3.4 FEATURED PRODUCTS (3–4 cards on homepage)

> 🔧 Show the 1 real product first. Fill remaining 2–3 with placeholders from Section 4.

**EN**
```
SECTION LABEL : Our Tools
H2            : Built for businesses that run on spreadsheets and dashboards.

FILTER HINT   : (No filter on homepage — show 3 cards. Full filter on /catalog.)

CTA below grid: See all products  →  /catalog
```

**VI**
```
SECTION LABEL : Sản phẩm của chúng tôi
H2            : Được xây dựng cho doanh nghiệp vận hành bằng bảng tính và dashboard.
CTA           : Xem tất cả sản phẩm  →  /catalog
```

---

### 3.5 FREE TOOL PROMO STRIP

**EN**
```
LABEL    : Free to use — no account needed
H3       : Break-Even Calculator
BODY     : Enter your fixed costs, selling price, and variable cost per unit.
           Get your break-even point in seconds.
CTA      : Use the free calculator →  /tool
SECONDARY: Bookmark it · Share it with your team
```

**VI**
```
LABEL    : Miễn phí — không cần tài khoản
H3       : Máy tính điểm hòa vốn
BODY     : Nhập chi phí cố định, giá bán và chi phí biến đổi mỗi đơn vị.
           Nhận điểm hòa vốn ngay lập tức.
CTA      : Dùng thử miễn phí →  /tool
```

---

### 3.6 HOME FINAL CTA

**EN**
```
H2   : Ready to see your numbers clearly?
BODY : Try any product live. Pay only if it works for you.
CTA  : Browse the Catalog  →  /catalog
```

**VI**
```
H2   : Sẵn sàng nhìn thấy con số rõ ràng chưa?
BODY : Dùng thử bất kỳ sản phẩm nào. Chỉ trả tiền nếu nó phù hợp với bạn.
CTA  : Khám phá sản phẩm  →  /catalog
```

---

## 4. CATALOG PAGE  (`/catalog`)

### 4.1 Page Header

**EN**
```
H1   : Finance Tools for SMEs
SUB  : Try any product live before you buy. Instant delivery after purchase.
```

**VI**
```
H1   : Công cụ tài chính cho doanh nghiệp vừa và nhỏ
SUB  : Thử demo trực tiếp trước khi mua. Truy cập ngay sau thanh toán.
```

### 4.2 Filter Labels

| Filter | EN Label | VI Label |
|--------|----------|----------|
| All | All products | Tất cả |
| Dashboard | Dashboard | Dashboard |
| Sheet Tool | Sheet Tool | Công cụ Sheets |
| Notion | Notion | Notion |
| Add-on | Add-on | Tiện ích mở rộng |

### 4.3 Product Card Template (per card)

```
[THUMBNAIL]           — 16:9 screenshot of product
PRODUCT TYPE BADGE    — e.g. "Sheet Tool"
PRODUCT NAME          — H3
BENEFIT ONE-LINE      — p.small (1 sentence max)
PRICE                 — "$XX  /  XXX,000 ₫"  (currency toggle aware)
[Try demo]  [Buy now] — two buttons
```

### 4.4 Products List

> See Section 5 for full product details. Card data summarized here.

---

## 5. PRODUCTS

---

### 5.1 ✅ REAL PRODUCT — 13-Week Cash Flow Forecast

```
ID           : 13-week-cash-flow
URL slug     : /products/13-week-cash-flow
Type         : Sheet Tool
Name EN      : 13-Week Cash Flow Forecast
Name VI      : Dự báo dòng tiền 13 tuần
Price USD    : $39
Price VND    : {rate × 39} VND  (displayed as e.g. "999,000 ₫" if rate ≈ 25,641)
Thumbnail    : /assets/products/cashflow-thumb.png  (⚠️ PLACEHOLDER — use demo screenshot)
Demo URL     : https://docs.google.com/spreadsheets/d/1M28_ri4SlJ1g6JWWegQ-v-32Eoh4iF6X/preview
               🔧 Embed as: <iframe src="[demo URL]" width="100%" height="500px">
Delivery     : Downloadable file + Google Sheets "Make a copy" link
               Delivered: In account page + by email
LS Product ID: ⚠️ PLACEHOLDER — add after creating product in Lemon Squeezy
```

**HERO BLOCK**

```
EN:
  EYEBROW : Sheet Tool · $39 one-time
  H1      : 13-Week Cash Flow Forecast
  SUBHEAD : See your cash position week by week for the next 3 months.
            Flags the exact week you're about to run short — early enough to act.
  CTA 1   : Try the live demo  (scrolls to demo section)
  CTA 2   : Buy now — $39  (→ checkout)

VI:
  EYEBROW : Công cụ Sheets · $39 một lần
  H1      : Dự báo dòng tiền 13 tuần
  SUBHEAD : Theo dõi dòng tiền vào – ra từng tuần trong 3 tháng tới.
            Xác định đúng tuần bạn sắp thiếu tiền — đủ sớm để xử lý.
  CTA 1   : Thử demo trực tiếp
  CTA 2   : Mua ngay — $39
```

**LIVE DEMO BLOCK**

```
EN:
  SECTION LABEL : Live Demo — No signup required
  H2            : Try it now. This is the actual product.
  CAPTION       : ↑ This is a read-only view of the real spreadsheet.
                  Enter numbers in the yellow cells to see the model respond.
                  (Read-only: you can view and explore, but not save changes.)
  EMBED         : <iframe src="[demo URL]" ...>

VI:
  SECTION LABEL : Demo trực tiếp — Không cần đăng ký
  H2            : Thử ngay. Đây là sản phẩm thật.
  CAPTION       : ↑ Đây là bản xem chỉ đọc của bảng tính thực.
                  Nhập số vào các ô màu vàng để xem mô hình phản hồi.
                  (Chỉ xem: bạn có thể khám phá nhưng không lưu được thay đổi.)
```

**VIDEO WALKTHROUGH BLOCK**

```
EN:
  SECTION LABEL : Video Walkthrough
  H2            : See how it works in 90 seconds.
  CAPTION       : A quick tour of the model — how to enter your data,
                  read the weekly forecast, and interpret the cash-warning alerts.
  EMBED         : <iframe src="https://www.youtube.com/embed/PLACEHOLDER_VIDEO_ID" ...>
  ⚠️            : Replace PLACEHOLDER_VIDEO_ID with actual YouTube video ID

VI:
  SECTION LABEL : Video hướng dẫn
  H2            : Xem cách hoạt động trong 90 giây.
  CAPTION       : Hướng dẫn nhanh về mô hình — cách nhập dữ liệu,
                  đọc dự báo từng tuần và hiểu các cảnh báo dòng tiền.
```

**WHAT'S INSIDE (Features)**

```
EN:
  SECTION LABEL : What's inside
  H2            : Everything you need to manage 13 weeks of cash.

  FEATURE 1
    Title : Weekly cash-in vs. cash-out layout
    Body  : Enter expected receipts and payments for each of the 13 weeks.
            The model does the math — you just fill in what you know.

  FEATURE 2
    Title : Automatic cash-warning flag
    Body  : The model highlights the exact week your balance goes negative,
            so you see the problem before it becomes a crisis.

  FEATURE 3
    Title : Running cash balance tracker
    Body  : See your cumulative cash position week by week — not just totals,
            but the actual balance you'll have at the end of each week.

  FEATURE 4
    Title : Opening balance input
    Body  : Start from your real cash position today. The model builds forward
            from there.

  FEATURE 5
    Title : Clean, editable Google Sheets format
    Body  : No macros, no hidden formulas. Every cell is transparent and
            editable. Works in Excel too.

  FEATURE 6
    Title : One-time purchase — yours forever
    Body  : Pay once, download, and use it for as long as you need it.
            No subscription.

VI:
  SECTION LABEL : Nội dung bên trong
  H2            : Mọi thứ bạn cần để quản lý dòng tiền 13 tuần.

  FEATURE 1
    Title : Bố cục tiền vào – tiền ra từng tuần
    Body  : Nhập các khoản thu và chi dự kiến cho từng tuần trong 13 tuần.
            Mô hình tự tính — bạn chỉ cần điền những gì bạn biết.

  FEATURE 2
    Title : Cờ cảnh báo dòng tiền tự động
    Body  : Mô hình tô đậm đúng tuần số dư tiền mặt xuống âm —
            để bạn thấy vấn đề trước khi nó trở thành khủng hoảng.

  FEATURE 3
    Title : Theo dõi số dư tiền tích lũy
    Body  : Xem vị thế tiền mặt tổng cộng từng tuần — không chỉ tổng số,
            mà là số dư thực tế bạn sẽ có cuối mỗi tuần.

  FEATURE 4
    Title : Nhập số dư mở đầu
    Body  : Bắt đầu từ vị thế tiền mặt thực tế của bạn hôm nay.
            Mô hình tính toán tiếp từ đó.

  FEATURE 5
    Title : Định dạng Google Sheets rõ ràng, có thể chỉnh sửa
    Body  : Không có macro, không có công thức ẩn. Mọi ô đều minh bạch
            và có thể chỉnh sửa. Dùng được cả trong Excel.

  FEATURE 6
    Title : Mua một lần — dùng mãi mãi
    Body  : Thanh toán một lần, tải xuống và dùng bao lâu tùy bạn.
            Không có phí đăng ký.
```

**PRODUCT AS PROOF BLOCK**

```
EN:
  SECTION LABEL : See it work
  H2            : This is what the model catches.

  IMAGE         : /assets/products/cashflow-proof-screenshot.png
                  ⚠️ PLACEHOLDER — Use real screenshot from demo sheet
                  showing a highlighted week with negative cash balance

  CAPTION       : This is the week the model detected [Demo Co.] was about
                  to go cash-negative — 4 weeks before it happened.

  DISCLAIMER    : Live demo result on a sample business. Not a customer quote.
                  The numbers are real outputs from the model — not projections we made up.

  BODY          : The alert fired at Week 5. The demo business had until Week 9
                  before cash ran out. Four weeks is enough time to make a call —
                  delay a non-critical payment, push on a receivable, or arrange
                  a short-term credit line. Without this model, Week 9 would have
                  been a surprise.

VI:
  SECTION LABEL : Xem sản phẩm hoạt động
  H2            : Đây là điều mô hình phát hiện được.

  CAPTION       : Đây là tuần mô hình phát hiện doanh nghiệp mẫu sắp âm tiền —
                  trước 4 tuần.

  DISCLAIMER    : Kết quả demo trên dữ liệu mẫu. Không phải lời khách hàng.
                  Các con số là đầu ra thực từ mô hình — không phải số chúng tôi tự nghĩ ra.

  BODY          : Cảnh báo kích hoạt ở Tuần 5. Doanh nghiệp mẫu còn đến Tuần 9
                  trước khi hết tiền. Bốn tuần đủ để hành động —
                  trì hoãn một khoản chi không cấp thiết, đẩy nhanh thu hồi công nợ,
                  hoặc thu xếp hạn mức tín dụng ngắn hạn.
                  Không có mô hình này, Tuần 9 sẽ là một bất ngờ.
```

**PRICING BLOCK**

```
EN:
  SECTION LABEL : Pricing
  H2            : One price. Yours forever.

  PRICE USD     : $39
  PRICE VND     : {rate × 39} ₫  (live, fallback 999,000 ₫)
  BILLING       : One-time purchase. No subscription. No renewal fee.

  INCLUDES:
    ✓  Google Sheets file (Make a copy)
    ✓  Downloadable Excel-compatible backup
    ✓  Access via your Luxora account forever
    ✓  Email delivery with your access link
    ✓  Free updates to this version

  CTA PRIMARY   : Buy now — $39  →  [Lemon Squeezy checkout link]
  CTA SECONDARY : Pay in VND (Vietnamese buyers)  →  [WooCommerce product page]

  NOTE          : 🔧 Insert Lemon Squeezy checkout URL after product setup.
                  🔧 Insert WooCommerce product URL after store setup.

VI:
  H2            : Một mức giá. Dùng mãi mãi.
  BILLING       : Mua một lần. Không đăng ký. Không gia hạn.
  INCLUDES:
    ✓  File Google Sheets (Tạo bản sao)
    ✓  Bản sao lưu tương thích Excel
    ✓  Truy cập qua tài khoản Luxora mãi mãi
    ✓  Giao file qua email
    ✓  Cập nhật miễn phí cho phiên bản này
  CTA PRIMARY   : Mua ngay — {VND price}₫
  CTA SECONDARY : Thanh toán quốc tế (USD)
```

**HOW YOU GET ACCESS**

```
EN:
  SECTION LABEL : How you get access
  H2            : Instant delivery. Three ways to access.

  STEP 1
    Icon  : ✉
    Title : Check your email
    Body  : Your access link and license key arrive in your inbox
            within 60 seconds of purchase.

  STEP 2
    Icon  : 📋
    Title : Make a copy in Google Sheets
    Body  : Click the "Make a copy" link to save a personal copy
            to your Google Drive. It's yours to edit.

  STEP 3
    Icon  : 🔑
    Title : Or download the file
    Body  : Prefer Excel? Download the .xlsx version from your account page
            or the email link.

  ACCOUNT NOTE  : All your purchases are saved at /account → My Products.
                  Come back anytime to re-download or retrieve your links.

VI:
  H2            : Giao hàng ngay lập tức. Ba cách truy cập.

  STEP 1
    Title : Kiểm tra email
    Body  : Link truy cập và license key đến hộp thư của bạn
            trong vòng 60 giây sau khi mua.

  STEP 2
    Title : Tạo bản sao trên Google Sheets
    Body  : Nhấp vào link "Tạo bản sao" để lưu bản cá nhân
            vào Google Drive của bạn. Thoải mái chỉnh sửa.

  STEP 3
    Title : Hoặc tải file về
    Body  : Muốn dùng Excel? Tải file .xlsx từ trang tài khoản
            hoặc link trong email.
```

**FAQ BLOCK**

```
EN:
  SECTION LABEL : FAQ
  H2            : Questions before you buy

  Q1: Will this work in Excel?
  A1: Yes. The file is built in Google Sheets but downloads as .xlsx and works
      in Microsoft Excel with full functionality.

  Q2: Do I need finance experience to use this?
  A2: No. The model is designed for business owners and operations staff —
      not accountants. If you know your weekly receipts and payments, you can
      use it. Instructions are included.

  Q3: Can I share it with my team?
  A3: Your license covers one business. You can share the file with team members
      at the same company — just don't redistribute it publicly or resell it.

  Q4: What happens if I need help?
  A4: Email luxora@luxorasystem.com. We reply within 1 business day.

  Q5: Will this work for my industry?
  A5: Yes. The model is industry-agnostic — it works wherever you have weekly
      cash inflows and outflows. Retail, services, F&B, professional services,
      and more.

VI:
  H2            : Câu hỏi trước khi mua

  Q1: Sản phẩm có dùng được trong Excel không?
  A1: Có. File được xây dựng trên Google Sheets nhưng tải về dạng .xlsx
      và hoạt động đầy đủ trong Microsoft Excel.

  Q2: Tôi có cần kiến thức tài chính để dùng không?
  A2: Không. Mô hình được thiết kế cho chủ doanh nghiệp và nhân viên vận hành —
      không phải kế toán. Nếu bạn biết các khoản thu chi từng tuần,
      bạn có thể dùng được. Có hướng dẫn kèm theo.

  Q3: Tôi có thể chia sẻ cho nhóm của mình không?
  A3: License của bạn áp dụng cho một doanh nghiệp. Bạn có thể chia sẻ
      file với thành viên trong cùng công ty — nhưng không phân phối lại
      công khai hoặc bán lại.

  Q4: Nếu tôi cần hỗ trợ thì liên hệ thế nào?
  A4: Email luxora@luxorasystem.com. Chúng tôi phản hồi trong 1 ngày làm việc.

  Q5: Sản phẩm có phù hợp với ngành của tôi không?
  A5: Có. Mô hình không phụ thuộc vào ngành — hoạt động ở bất kỳ đâu có
      dòng tiền vào – ra hàng tuần. Bán lẻ, dịch vụ, F&B, dịch vụ chuyên nghiệp, v.v.
```

**MONEY-BACK GUARANTEE**

```
EN:
  H3       : 14-day money-back guarantee
  BODY     : If the product doesn't work as described, email us within 14 days
             of purchase for a full refund — no questions asked.
             luxora@luxorasystem.com

VI:
  H3       : Hoàn tiền trong 14 ngày
  BODY     : Nếu sản phẩm không hoạt động như mô tả, gửi email cho chúng tôi
             trong vòng 14 ngày kể từ ngày mua để được hoàn tiền đầy đủ —
             không cần giải thích lý do.
```

**FINAL CTA (repeated at bottom)**

```
EN:
  H2   : Ready to see your next 13 weeks?
  CTA  : Buy now — $39  (same checkout link as above)
  LINK : or try the demo first  (scrolls up to demo section)

VI:
  H2   : Sẵn sàng nhìn thấy 13 tuần tới chưa?
  CTA  : Mua ngay — {VND}₫
  LINK : hoặc thử demo trước
```

---

### 5.2 ⚠️ PLACEHOLDER PRODUCT — Monthly P&L Dashboard

```
ID           : monthly-pl-dashboard
URL slug     : /products/monthly-pl-dashboard
Type         : Dashboard  (Looker Studio)
Name EN      : Monthly P&L Dashboard
Name VI      : Dashboard Lãi & Lỗ hàng tháng
Price USD    : $49
Price VND    : {rate × 49} ₫
Thumbnail    : ⚠️ PLACEHOLDER
Demo URL     : ⚠️ PLACEHOLDER — public Looker Studio link
Delivery     : Private Looker Studio report (shared view link in account)
               + access via account page and email
LS Product ID: ⚠️ PLACEHOLDER

BENEFIT EN   : One-page view of your revenue, costs, gross margin, and net
               profit — every month, automatically updated.
BENEFIT VI   : Nhìn thấy doanh thu, chi phí, biên lợi nhuận gộp và lợi nhuận ròng
               trong một trang — cập nhật tự động mỗi tháng.
```

---

### 5.3 ⚠️ PLACEHOLDER PRODUCT — Expense Tracker & Budget Planner

```
ID           : expense-tracker
URL slug     : /products/expense-tracker
Type         : Sheet Tool  (Google Sheets)
Name EN      : Expense Tracker & Budget Planner
Name VI      : Theo dõi chi phí & Lập ngân sách
Price USD    : $29
Price VND    : {rate × 29} ₫
Thumbnail    : ⚠️ PLACEHOLDER
Demo URL     : ⚠️ PLACEHOLDER — Google Sheets read-only link
Delivery     : Google Sheets "Make a copy" link + downloadable .xlsx
LS Product ID: ⚠️ PLACEHOLDER

BENEFIT EN   : Log every expense, set monthly budgets by category, and see
               instantly where you're over or under — every month.
BENEFIT VI   : Ghi lại mọi chi phí, đặt ngân sách hàng tháng theo danh mục,
               và xem ngay mình đang vượt hay thiếu so với kế hoạch — mỗi tháng.
```

---

### 5.4 ⚠️ PLACEHOLDER PRODUCT — Business Finance OS (Notion)

```
ID           : business-finance-os
URL slug     : /products/business-finance-os
Type         : Notion
Name EN      : Business Finance OS
Name VI      : Hệ thống tài chính doanh nghiệp (Notion)
Price USD    : $35
Price VND    : {rate × 35} ₫
Thumbnail    : ⚠️ PLACEHOLDER
Demo URL     : ⚠️ PLACEHOLDER — public Notion page link
Delivery     : Notion "Duplicate template" link
               + downloadable backup PDF
LS Product ID: ⚠️ PLACEHOLDER

BENEFIT EN   : A complete Notion workspace to track invoices, expenses, P&L,
               and financial goals — all in one place, no spreadsheet skills needed.
BENEFIT VI   : Không gian Notion hoàn chỉnh để theo dõi hóa đơn, chi phí, lãi lỗ
               và mục tiêu tài chính — tất cả trong một nơi, không cần kỹ năng bảng tính.
```

---

## 6. FREE TOOL PAGE  (`/tool`)

### 6.1 Page Header

```
EN:
  PAGE TITLE  : Break-Even Calculator — Free
  H1          : Break-Even Calculator
  SUBHEAD     : Enter your numbers. See your break-even point instantly.
                Free to use. No account needed.
  LABEL STRIP : · Works in USD and VND  · Results update in real time
                · Bookmark this page — or share it with your team

VI:
  PAGE TITLE  : Máy tính điểm hòa vốn — Miễn phí
  H1          : Máy tính điểm hòa vốn
  SUBHEAD     : Nhập số liệu của bạn. Xem điểm hòa vốn ngay lập tức.
                Miễn phí. Không cần tài khoản.
  LABEL STRIP : · Hỗ trợ USD và VND  · Kết quả cập nhật theo thời gian thực
                · Đánh dấu trang này — hoặc chia sẻ cho nhóm của bạn
```

### 6.2 Calculator UI — Inputs

```
INPUT 1:
  Label EN  : Fixed Costs (per month)
  Label VI  : Chi phí cố định (mỗi tháng)
  Hint EN   : e.g. rent, salaries, insurance — costs that don't change with sales
  Hint VI   : vd: thuê mặt bằng, lương, bảo hiểm — chi phí không đổi theo doanh số
  Type      : number, min 0
  Prefix    : $ or ₫ (follows currency toggle)

INPUT 2:
  Label EN  : Selling Price (per unit)
  Label VI  : Giá bán (mỗi đơn vị)
  Hint EN   : The price you charge one customer for one unit / service
  Hint VI   : Giá bạn tính cho một khách hàng cho một đơn vị / dịch vụ
  Type      : number, min 0.01

INPUT 3:
  Label EN  : Variable Cost (per unit)
  Label VI  : Chi phí biến đổi (mỗi đơn vị)
  Hint EN   : e.g. materials, packaging, commission — costs that scale with each sale
  Hint VI   : vd: nguyên vật liệu, bao bì, hoa hồng — chi phí tăng theo từng lần bán
  Type      : number, min 0

CALCULATE BUTTON:
  Label EN  : Calculate break-even
  Label VI  : Tính điểm hòa vốn

RESET LINK:
  Label EN  : Reset
  Label VI  : Đặt lại
```

### 6.3 Calculator UI — Outputs & Validation

```
OUTPUT 1:
  Label EN  : Break-even (units)
  Label VI  : Điểm hòa vốn (đơn vị)
  Value     : CEILING(Fixed Costs / (Selling Price − Variable Cost))
  Format    : Integer with thousands separator  e.g. "1,234 units" / "1.234 đơn vị"

OUTPUT 2:
  Label EN  : Break-even (revenue)
  Label VI  : Điểm hòa vốn (doanh thu)
  Value     : Break-even units × Selling Price
  Format    : Currency — "$12,340" or "316,500,000 ₫"

OUTPUT 3:
  Label EN  : Contribution margin per unit
  Label VI  : Biên đóng góp mỗi đơn vị
  Value     : Selling Price − Variable Cost
  Format    : Currency + percentage of selling price

EXPLANATION (below outputs):
  EN: "You need to sell {units} units each month to cover all your costs.
       Every unit sold beyond that is pure profit."
  VI: "Bạn cần bán {units} đơn vị mỗi tháng để trang trải toàn bộ chi phí.
       Mỗi đơn vị bán thêm ngoài con số này là lợi nhuận ròng."

VALIDATION ERRORS:
  EN:
    EMPTY         : Please enter a value.
    ZERO PRICE    : Selling price must be greater than 0.
    NEGATIVE      : Please enter a positive number.
    MARGIN_ZERO   : Selling price must be higher than variable cost.
                    (Otherwise you lose money on every sale.)
    MARGIN_NEG    : Your variable cost is higher than your selling price.
                    You're losing {amount} on every unit sold.

  VI:
    EMPTY         : Vui lòng nhập giá trị.
    ZERO PRICE    : Giá bán phải lớn hơn 0.
    NEGATIVE      : Vui lòng nhập số dương.
    MARGIN_ZERO   : Giá bán phải cao hơn chi phí biến đổi.
                    (Ngược lại bạn lỗ mỗi lần bán.)
    MARGIN_NEG    : Chi phí biến đổi cao hơn giá bán của bạn.
                    Bạn đang lỗ {amount} mỗi đơn vị bán ra.
```

### 6.4 Post-Result CTA (shown after calculation)

```
EN:
  H3        : Want to see your full cash position — not just break-even?
  BODY      : The 13-Week Cash Flow Forecast maps out every dollar in and out
              for the next 3 months, and flags the week you're about to run short.
  CTA       : See the full dashboard  →  /products/13-week-cash-flow
  SECONDARY : Browse all tools  →  /catalog

VI:
  H3        : Muốn xem toàn bộ vị thế tiền mặt — không chỉ điểm hòa vốn?
  BODY      : Mô hình dự báo dòng tiền 13 tuần lập bản đồ từng đồng vào – ra
              trong 3 tháng tới, và gắn cờ tuần bạn sắp thiếu tiền.
  CTA       : Xem dashboard đầy đủ  →  /products/13-week-cash-flow
  SECONDARY : Xem tất cả công cụ  →  /catalog
```

### 6.5 Email Capture (Brevo)

```
EN:
  LABEL     : Want the result sent to your inbox?
  SUBTEXT   : We'll also send you new tools and templates — one email per month, unsubscribe anytime.
  FIELD     : Email address
  BUTTON    : Send me the result
  SUCCESS   : Done — check your inbox.
  ERROR     : Something went wrong. Try again or email luxora@luxorasystem.com

VI:
  LABEL     : Muốn nhận kết quả vào hộp thư?
  SUBTEXT   : Chúng tôi cũng sẽ gửi công cụ và mẫu mới — một email mỗi tháng, hủy đăng ký bất cứ lúc nào.
  FIELD     : Địa chỉ email
  BUTTON    : Gửi kết quả cho tôi
  SUCCESS   : Xong — kiểm tra hộp thư của bạn.
  ERROR     : Có lỗi xảy ra. Thử lại hoặc email luxora@luxorasystem.com

🔧 TECHNICAL:
  Brevo list ID : ⚠️ PLACEHOLDER — add after Brevo list setup
  Double opt-in : Yes (required for EU compliance)
  Tag           : "free-tool-breakeven"
  Endpoint      : POST https://api.brevo.com/v3/contacts
  Payload       : { email, listIds: [LIST_ID], attributes: { TOOL: "breakeven" } }
```

---

## 7. CHECKOUT & PAYMENT

### 7.1 Payment Architecture

```
🔧 ARCHITECTURE: Dual-platform, single frontend

INTERNATIONAL (USD + all non-VN currencies):
  Provider   : Lemon Squeezy
  What it handles: Card, PayPal, global taxes, license key delivery
  Checkout   : Redirect to Lemon Squeezy hosted checkout page
  License    : LS generates license key → webhook → Luxora account system
  Button     : "Buy now — $XX"

VIETNAM LOCAL (VND):
  Provider   : WooCommerce + payment plugins
  Plugins    : VNPay, MoMo, Bank transfer / QR code
  Checkout   : Redirect to WooCommerce checkout (same product, VND price)
  Delivery   : WooCommerce sends access email → Luxora account webhook
  Button     : "Thanh toán bằng VND" or "Mua tại Việt Nam"

CURRENCY TOGGLE LOGIC:
  - If visitor's currency = USD → show Lemon Squeezy button prominently
  - If visitor's currency = VND → show WooCommerce/VNPay button prominently
  - Both options always visible, smaller secondary
  - VND price = live rate × USD price, rounded to nearest 1,000 ₫
```

### 7.2 Payment Method Labels (on checkout button area)

```
EN:
  INTERNATIONAL : Pay with card (Visa, Mastercard, PayPal)  — powered by Lemon Squeezy
  VIETNAM LOCAL : Pay in VND — VNPay / MoMo / Bank transfer
  OR DIVIDER    : or
  SECURE BADGE  : Secure checkout · 14-day money-back guarantee

VI:
  INTERNATIONAL : Thanh toán quốc tế (Visa, Mastercard, PayPal)
  VIETNAM LOCAL : Thanh toán nội địa — VNPay / MoMo / Chuyển khoản
  OR DIVIDER    : hoặc
  SECURE BADGE  : Thanh toán bảo mật · Hoàn tiền trong 14 ngày
```

### 7.3 Money-Back Guarantee (standalone badge component)

```
EN:
  TITLE : 14-Day Money-Back Guarantee
  BODY  : If the product doesn't work as described — or just doesn't fit your needs —
          email us within 14 days and we'll refund you in full.
          No forms. No hoops. Just email: luxora@luxorasystem.com

VI:
  TITLE : Bảo đảm hoàn tiền 14 ngày
  BODY  : Nếu sản phẩm không hoạt động như mô tả — hoặc đơn giản là không phù hợp —
          email cho chúng tôi trong 14 ngày và chúng tôi hoàn tiền đầy đủ.
          Không cần điền form. Chỉ cần email: luxora@luxorasystem.com
```

---

## 8. ORDER CONFIRMATION PAGE  (`/order-confirmation`)

### 8.1 Success Message

```
EN:
  H1     : You're in. Here's your access.
  BODY   : Your purchase is confirmed. Everything below is also on its way
           to your email inbox right now.
  EMAIL  : Sent to: {buyer_email}

VI:
  H1     : Mua thành công. Đây là quyền truy cập của bạn.
  BODY   : Thanh toán đã được xác nhận. Mọi thứ bên dưới cũng đang được gửi
           đến hộp thư email của bạn ngay bây giờ.
  EMAIL  : Đã gửi đến: {buyer_email}
```

### 8.2 Access Delivery Blocks (per product type)

**Type: Sheet Tool (e.g. 13-Week Cash Flow Forecast)**
```
EN:
  H3       : 13-Week Cash Flow Forecast
  ACTION 1 : Make a copy in Google Sheets
             → [Google Sheets "Make a copy" link]
             CAPTION: Click to save a personal editable copy to your Google Drive.
  ACTION 2 : Download the file (.xlsx)
             → [Direct download link]
             CAPTION: For Microsoft Excel users.
  LICENSE  : Your license key: [XXXX-XXXX-XXXX-XXXX]
             Keep this key — you may need it to re-access or verify your purchase.

VI:
  H3       : Dự báo dòng tiền 13 tuần
  ACTION 1 : Tạo bản sao trên Google Sheets
             CAPTION: Nhấp để lưu bản có thể chỉnh sửa vào Google Drive của bạn.
  ACTION 2 : Tải file (.xlsx)
             CAPTION: Dành cho người dùng Microsoft Excel.
  LICENSE  : License key của bạn: [XXXX-XXXX-XXXX-XXXX]
```

**Type: Dashboard (Looker Studio) — ⚠️ PLACEHOLDER**
```
EN:
  ACTION   : Open your dashboard →  [Private Looker Studio link]
  CAPTION  : This is your private copy. Do not share this link publicly.

VI:
  ACTION   : Mở dashboard của bạn
  CAPTION  : Đây là bản sao riêng của bạn. Không chia sẻ link này công khai.
```

**Type: Notion — ⚠️ PLACEHOLDER**
```
EN:
  ACTION 1 : Duplicate this Notion template →  [Notion duplicate link]
  ACTION 2 : Download PDF backup →  [PDF download]

VI:
  ACTION 1 : Nhân đôi template Notion này
  ACTION 2 : Tải bản sao lưu PDF
```

### 8.3 Account Link

```
EN:
  NOTE : All your purchases are saved in your account.
         → Go to My Products  (/account)

VI:
  NOTE : Tất cả sản phẩm đã mua được lưu trong tài khoản của bạn.
         → Xem sản phẩm của tôi  (/account)
```

---

## 9. ACCOUNT / MY PRODUCTS PAGE  (`/account`)

### 9.1 Page Header

```
EN:
  H1   : My Products
  SUB  : All your purchases in one place. Access your files, links, and license keys anytime.

VI:
  H1   : Sản phẩm của tôi
  SUB  : Tất cả sản phẩm đã mua ở một nơi. Truy cập file, link và license key bất cứ lúc nào.
```

### 9.2 Product Row (per purchased product)

```
EN:
  COLUMNS: Product name | Type | Date | Access (buttons) | License key
  BUTTONS per type:
    Sheet Tool : [Make a copy]  [Download .xlsx]
    Dashboard  : [Open dashboard]
    Notion     : [Duplicate template]  [Download PDF]
    Add-on     : [Open / Install]

VI:
  [Tạo bản sao]  [Tải xuống .xlsx]
  [Mở dashboard]
  [Nhân đôi template]  [Tải PDF]
  [Mở / Cài đặt]
```

### 9.3 Empty State (no purchases yet)

```
EN:
  TITLE : No products yet.
  BODY  : When you buy something, it'll show up here instantly.
  CTA   : Browse the catalog  →  /catalog

VI:
  TITLE : Chưa có sản phẩm nào.
  BODY  : Khi bạn mua thứ gì đó, nó sẽ hiển thị ở đây ngay lập tức.
  CTA   : Xem catalog  →  /catalog
```

### 9.4 Login / Auth

```
🔧 Auth options (choose one before build):
  Option A: Magic link email (no password) — simplest UX
  Option B: Google OAuth — fastest for buyers who have a Google account
  Option C: Lemon Squeezy customer portal — built-in, no custom auth needed
  RECOMMENDED: Option C (Lemon Squeezy) for simplest build.
               LS has a built-in customer portal at:
               https://app.lemonsqueezy.com/my-orders

EN login prompt:
  TITLE : Sign in to view your products
  BODY  : Enter the email you used to purchase.
  FIELD : Email address
  BTN   : Send me a login link
  NOTE  : We'll email you a one-click sign-in link.

VI login prompt:
  TITLE : Đăng nhập để xem sản phẩm
  BODY  : Nhập email bạn đã dùng để mua hàng.
  FIELD : Địa chỉ email
  BTN   : Gửi link đăng nhập
  NOTE  : Chúng tôi sẽ email cho bạn một link đăng nhập một lần.
```

---

## 10. FOOTER

```
EN:
  LOGO + TAGLINE : LUXORA · Smarter Finance, Stronger Business

  COLUMN 1 — Products:
    13-Week Cash Flow Forecast  →  /products/13-week-cash-flow
    ⚠️ Monthly P&L Dashboard    →  /products/monthly-pl-dashboard
    ⚠️ Expense Tracker          →  /products/expense-tracker
    ⚠️ Business Finance OS      →  /products/business-finance-os
    See all products            →  /catalog

  COLUMN 2 — Free Tools:
    Break-Even Calculator       →  /tool
    (More tools coming)

  COLUMN 3 — Help:
    How It Works                →  /#how-it-works
    My Products (account)       →  /account
    Support                     →  mailto:luxora@luxorasystem.com
    Refund Policy               →  /refund-policy  ⚠️ PLACEHOLDER page

  COLUMN 4 — Legal:
    Privacy Policy              →  /privacy  ⚠️ PLACEHOLDER page
    Terms of Use                →  /terms    ⚠️ PLACEHOLDER page
    Cookie Policy               →  /cookies  ⚠️ PLACEHOLDER page

  BOTTOM BAR:
    © 2025 Luxora. All rights reserved.
    Language: EN | VI
    Currency: USD | VND

VI:
  LOGO + TAGLINE : LUXORA · Tài chính thông minh hơn, Doanh nghiệp vững chắc hơn

  COLUMN 1 — Sản phẩm: (same links, VI names)
  COLUMN 2 — Công cụ miễn phí:
    Máy tính điểm hòa vốn  →  /tool
  COLUMN 3 — Hỗ trợ:
    Cách hoạt động · Sản phẩm của tôi · Liên hệ hỗ trợ · Chính sách hoàn tiền
  COLUMN 4 — Pháp lý:
    Chính sách bảo mật · Điều khoản sử dụng · Chính sách cookie

  BOTTOM BAR:
    © 2025 Luxora. Bảo lưu mọi quyền.
```

---

## 11. SHARED UI COPY

### 11.1 Buttons (global)

| Key | EN | VI |
|-----|----|----|
| btn_try_demo | Try live demo | Thử demo trực tiếp |
| btn_buy | Buy now — ${price} | Mua ngay — {price}₫ |
| btn_see_all | See all products | Xem tất cả sản phẩm |
| btn_learn_more | Learn more | Tìm hiểu thêm |
| btn_calculate | Calculate | Tính toán |
| btn_reset | Reset | Đặt lại |
| btn_send_email | Send to my email | Gửi vào email của tôi |
| btn_make_copy | Make a copy (Google Sheets) | Tạo bản sao (Google Sheets) |
| btn_download | Download file | Tải file |
| btn_open_dash | Open my dashboard | Mở dashboard của tôi |
| btn_duplicate | Duplicate template | Nhân đôi template |
| btn_login | Sign in | Đăng nhập |
| btn_back | ← Back | ← Quay lại |

### 11.2 Labels & Badges

| Key | EN | VI |
|-----|----|----|
| badge_free | Free | Miễn phí |
| badge_new | New | Mới |
| badge_popular | Popular | Phổ biến |
| badge_one_time | One-time purchase | Mua một lần |
| badge_no_signup | No signup needed | Không cần đăng ký |
| badge_instant | Instant access | Truy cập ngay |
| badge_14d | 14-day guarantee | Bảo đảm 14 ngày |
| type_sheet | Sheet Tool | Công cụ Sheets |
| type_dashboard | Dashboard | Dashboard |
| type_notion | Notion | Notion |
| type_addon | Add-on | Tiện ích mở rộng |

### 11.3 Currency Display

```
USD  :  $1,234.00
VND  :  1.234.000 ₫  (period as thousands separator)
     OR  1,234,000 ₫  (comma separator — match local convention)
     🔧 Use: Intl.NumberFormat('vi-VN', { style:'currency', currency:'VND' })

Live rate line:
  EN: "1 USD ≈ {rate} VND  ·  Rate updated live"
  VI: "1 USD ≈ {rate} VND  ·  Tỷ giá cập nhật tự động"
  FALLBACK: "Rate unavailable — VND price is approximate."
```

### 11.4 Loading & Empty States

| State | EN | VI |
|-------|----|----|
| Loading rates | Updating exchange rate… | Đang cập nhật tỷ giá… |
| Rate error | USD/VND rate unavailable | Không thể tải tỷ giá |
| No products | No products found. | Không tìm thấy sản phẩm. |
| Loading page | Loading… | Đang tải… |

### 11.5 Accessibility

```
ARIA labels (all interactive elements need these — add to implementation):
  lang_toggle   : "Switch site language"  /  "Chuyển ngôn ngữ"
  currency_tog  : "Switch currency display"  /  "Chuyển đơn vị tiền tệ"
  cart_icon     : "Shopping cart, {n} items"  /  "Giỏ hàng, {n} sản phẩm"
  account_icon  : "My account"  /  "Tài khoản của tôi"
  demo_iframe   : "Live product demo — {product name}"
  video_iframe  : "Product walkthrough video — {product name}"
```

---

## 12. EMAIL TEMPLATES

### 12.1 Order Confirmation Email

```
FROM    : Luxora <luxora@luxorasystem.com>
SUBJECT EN: Your Luxora order is confirmed — here's your access
SUBJECT VI: Đơn hàng Luxora đã được xác nhận — đây là quyền truy cập của bạn

BODY EN:
  Hi {first_name or "there"},

  Your purchase of [Product Name] is confirmed.

  --- YOUR ACCESS ---
  [Conditional per product type:]

  Sheet Tool:
    Make a copy (Google Sheets): [LINK]
    Download file (.xlsx): [LINK]
    License key: XXXX-XXXX-XXXX-XXXX

  Dashboard:
    Open your dashboard: [LINK]
    License key: XXXX-XXXX-XXXX-XXXX

  Notion:
    Duplicate this template: [LINK]
    License key: XXXX-XXXX-XXXX-XXXX

  --- KEEP THIS EMAIL ---
  You can also access all your products anytime at:
  https://luxorasystem.com/account

  Questions? Reply to this email or write to luxora@luxorasystem.com.
  We reply within 1 business day.

  --- MONEY-BACK ---
  If something doesn't work, email us within 14 days for a full refund.

  — The Luxora team

BODY VI:
  Xin chào {first_name or "bạn"},

  Đơn mua [Product Name] của bạn đã được xác nhận.

  --- QUYỀN TRUY CẬP ---
  [Per product type — same structure as above in Vietnamese]

  --- LƯU EMAIL NÀY ---
  Bạn cũng có thể truy cập tất cả sản phẩm bất cứ lúc nào tại:
  https://luxorasystem.com/account

  Câu hỏi? Trả lời email này hoặc viết đến luxora@luxorasystem.com.
  Chúng tôi phản hồi trong 1 ngày làm việc.

  --- HOÀN TIỀN ---
  Nếu có vấn đề, email cho chúng tôi trong 14 ngày để được hoàn tiền đầy đủ.

  — Đội ngũ Luxora
```

### 12.2 Brevo Welcome Email (after free tool sign-up)

```
FROM    : Luxora <luxora@luxorasystem.com>
SUBJECT EN: Your break-even result + what's next
SUBJECT VI: Kết quả điểm hòa vốn của bạn + bước tiếp theo

BODY EN:
  Hi,

  Here's your break-even calculation:

  Fixed costs: {fixed_costs}
  Selling price: {price}
  Variable cost: {var_cost}

  → Break-even: {units} units / month
  → Break-even revenue: {revenue}

  ---

  If you want to see your full cash position — not just break-even —
  the 13-Week Cash Flow Forecast maps out every dollar in and out
  for the next 3 months, and flags the week you're about to run short.

  Try the live demo (no signup): https://luxorasystem.com/products/13-week-cash-flow

  — Luxora

BODY VI: [Same structure in Vietnamese]

🔧 Brevo settings:
  List: "free-tool-leads"
  Double opt-in: Yes
  Unsubscribe link: Required (Brevo auto-adds)
  Follow-up sequence: ⚠️ PLACEHOLDER — add after list setup
```

---

## 13. TECHNICAL NOTES & PLACEHOLDERS

### 13.1 APIs & Services

```
Exchange Rate API:
  Endpoint   : GET https://open.er-api.com/v6/latest/USD
  Field       : response.rates.VND
  Cache       : 1 hour (localStorage with timestamp)
  Fallback    : 25,500
  Display     : Round to nearest whole number

Lemon Squeezy:
  Dashboard   : https://app.lemonsqueezy.com
  Webhook     : POST /api/ls-webhook  (verify HMAC signature)
  Events      : order_created → deliver access + create account entry
  License key : LS generates automatically per product config
  Store URL   : ⚠️ PLACEHOLDER — set after LS store setup
  Product IDs : ⚠️ PLACEHOLDER — set per product after creation

WooCommerce (Vietnam local):
  Instance    : ⚠️ PLACEHOLDER — WordPress install URL
  Plugins     : WooCommerce, WooCommerce VNPay gateway, WooCommerce MoMo
  Webhook     : woocommerce_order_completed → sync to account system
  Product IDs : ⚠️ PLACEHOLDER

Brevo:
  API key     : ⚠️ PLACEHOLDER — from Brevo dashboard
  List ID     : ⚠️ PLACEHOLDER
  Endpoint    : POST https://api.brevo.com/v3/contacts

Google Sheets Demo embed:
  Product     : 13-Week Cash Flow Forecast
  Embed URL   : https://docs.google.com/spreadsheets/d/1M28_ri4SlJ1g6JWWegQ-v-32Eoh4iF6X/preview
  iframe attrs: width="100%" height="560" frameborder="0" allow="autoplay"
```

### 13.2 Assets Needed Before Launch

```
⚠️ REQUIRED:
  /assets/logo.png                   — provided, place here
  /assets/favicon.ico                — generate from logo
  /assets/og-default.png             — 1200×630, brand card
  /assets/products/cashflow-thumb.png — product screenshot (catalog card)
  /assets/products/cashflow-proof-screenshot.png  — dashboard flagging cash warning

⚠️ OPTIONAL (boost conversions):
  /assets/products/cashflow-demo.gif  — short animated preview (for catalog card hover)
  /assets/hero-visual.png             — hero section right-side image

🔧 Placeholder images: use /placeholder.svg or a colored box until real assets ready.
```

### 13.3 Pages Still Needed (stub pages)

```
/refund-policy   — 14-day policy, plain text
/privacy         — GDPR-compatible privacy policy
/terms           — Terms of use for digital products
/cookies         — Cookie notice
/404             — Custom 404 with catalog link
```

### 13.4 SEO Metadata

```
Home (/):
  Title       : Luxora — Finance Tools for SMEs | Try Before You Buy
  Description : Interactive dashboards and smart spreadsheets for small businesses.
                Try any product live — no signup. Buy what works. Instant access.
  Title VI    : Luxora — Công cụ tài chính cho SME | Thử trước, mua sau

Product (/products/13-week-cash-flow):
  Title       : 13-Week Cash Flow Forecast — Luxora ($39)
  Description : See your cash position week by week for the next 3 months.
                Flags the exact week you're about to run short — early enough to act.

Free Tool (/tool):
  Title       : Break-Even Calculator — Free | Luxora
  Description : Calculate your break-even point in seconds. Free, bilingual, no signup.
                Works in USD and VND.
  Title VI    : Máy tính điểm hòa vốn — Miễn phí | Luxora
```

---

*End of CONTENT.md — last section: 13.4*
*Total products: 1 confirmed + 3 placeholder*
*Total pages: Home, Catalog, Product Detail (×4), Free Tool, Order Confirmation, Account, + 4 legal stubs*
