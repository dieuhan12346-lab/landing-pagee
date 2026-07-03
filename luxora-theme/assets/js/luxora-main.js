/**
 * Luxora Theme — Main JS
 * Handles: bilingual toggle, currency toggle, live exchange rate,
 *           break-even calculator, FAQ accordion, mobile menu,
 *           header scroll effect, WC cart fragment update.
 */

/* ================================================================
   TRANSLATIONS (extend per-page with Object.assign before DOMContentLoaded)
   ================================================================ */
var T = { en: {}, vi: {} };

Object.assign(T.en, {
  // Nav
  nav_cta: 'See All Products',

  // Hero
  hero_eyebrow: 'Finance tools for SMEs · Try live · No signup required',
  hero_live:    'Live demo',
  hero_h1:      'The Finance Tools <em>Your Business</em> Has Been Missing',
  hero_sub:     'Interactive dashboards and smart spreadsheets — try any product live before you buy. No account needed.',
  hero_cta1:    'Browse the Catalog',
  hero_cta2:    'Try the Free Tool',
  hero_trust1:  '13-week cash visibility',
  hero_trust2:  'Try before you buy',
  hero_trust3:  'Instant access after purchase',
  hero_float_num: '4 weeks',
  hero_float_txt: 'earlier warning than manual spreadsheets',
  dc_title:   '13-Week Cash Flow Forecast — Demo',
  dc_alert:   'Week 9: Cash balance goes negative (−$4,200)',
  dc_sub:     'Action needed — 4 weeks remaining to act',
  dc_kpi1:    'Current cash',
  dc_kpi2:    'Week 9 low',
  dc_kpi3:    'Recovery week',

  // How it works
  hiw_eyebrow:  'How it works',
  hiw_h2:       'Try it. See it work. Then decide.',
  hiw_sub:      'Every product is interactive before you pay a cent.',
  hiw_s1_title: 'Try the live demo',
  hiw_s1_body:  'Every product has a live, interactive demo you can use right now — no signup, no email required.',
  hiw_s2_title: 'See exactly what you get',
  hiw_s2_body:  "Watch a short walkthrough video and read what's inside. No guessing what you're buying.",
  hiw_s3_title: 'Buy and get instant access',
  hiw_s3_body:  'Pay once. Your license key, file link, or dashboard copy arrives in your inbox in under 60 seconds.',

  // Products
  prod_eyebrow: 'Our tools',
  prod_h2:      'Built for businesses that run on spreadsheets and dashboards.',
  prod_try:     'Try demo',
  prod_buy:     'Buy',
  prod_see_all: 'See all products',

  // Catalog
  catalog_eyebrow: 'All Products',
  catalog_h1:      'Finance Tools for SMEs',
  catalog_sub:     'Every product includes a live demo — try before you buy. One-time payment. Instant access.',
  catalog_all:     'All',

  // Tool strip
  ts_label:       'Free · No signup needed',
  ts_h2:          'Find your break-even point in 30 seconds.',
  ts_body:        'Enter your fixed costs, selling price, and variable cost. Get your break-even units and revenue instantly — in USD or VND.',
  ts_cta1:        'Use the free calculator',
  ts_cta2:        'Share with your team →',
  ts_calc_title:  'Break-Even Calculator',
  ts_calc_f1:     'Fixed costs / month',
  ts_calc_f2:     'Selling price / unit',
  ts_calc_f3:     'Variable cost / unit',
  ts_calc_r1:     'Break-even units',
  ts_calc_r2:     'Break-even revenue',
  ts_calc_link:   'Try the full version →',

  // CTA
  cta_h2:   'Ready to see your numbers clearly?',
  cta_body: 'Try any product live. Pay only if it works for you. Instant access after purchase.',
  cta_btn1: 'Browse the Catalog',
  cta_btn2: 'Try the Free Tool',
  cta_guar: '14-day money-back guarantee — no questions asked',

  // Free tool page
  ft_eyebrow:    'Free · No signup needed',
  ft_h1:         'Break-Even Calculator',
  ft_sub:        'Enter your three numbers. Get your break-even units and revenue instantly — in USD or VND.',
  ft_input_title: 'Your Numbers',
  ft_f1:         'Fixed costs per month',
  ft_f2:         'Selling price per unit',
  ft_f3:         'Variable cost per unit',
  ft_h1_hint:    'Rent, salaries, subscriptions — costs that stay the same regardless of sales.',
  ft_h2_hint:    'What you charge one customer for one sale.',
  ft_h3_hint:    'Cost of materials, delivery, or commissions per sale.',
  ft_calc_btn:   'Calculate',
  ft_no_data:    'We never store your data.',
  ft_results_title: 'Your break-even point',
  ft_r1: 'Break-even units / month',
  ft_r2: 'Break-even revenue / month',
  ft_r3: 'Contribution margin per unit',
  ft_r4: 'Margin rate',
  ft_bar_lo: 'Low margin',
  ft_bar_hi: 'High margin',
  ft_email_h:    'Want this as a full dashboard?',
  ft_email_body: "Send me your result and I'll follow up with a link to the full Break-Even & Scenario Planner spreadsheet — includes 12-month projections and sensitivity analysis.",
  ft_email_btn:  'Send me the tool',
  ft_email_ph:   'you@email.com',
  ft_email_privacy: 'No spam. One follow-up email only. Unsubscribe any time.',
  ft_faq_h: 'Frequently asked questions',
  ft_faq1_q: 'What is a break-even point?',
  ft_faq1_a: 'Your break-even point is the number of units you need to sell each month before you start making a profit.',
  ft_faq2_q: 'Why does the formula use CEILING?',
  ft_faq2_a: "Because you can't sell a fraction of a unit — we always round up to the next whole unit.",
  ft_faq3_q: 'How do I use this in VND?',
  ft_faq3_a: 'Switch the currency toggle to VND. Results convert automatically using the live rate.',
  ft_faq4_q: 'What if my margin is very low?',
  ft_faq4_a: 'A low contribution margin means you need high volume. Common fixes: raise prices, cut variable costs, or reduce fixed overhead.',

  // Single product
  sp_demo_title: 'Try it live — no account needed',
  sp_demo_body:  'Interactive demo preloaded with sample data. See exactly what you get before buying.',
  sp_demo_btn:   'Open live demo →',

  // Footer
  footer_tagline: 'Finance dashboards and smart spreadsheets for SMEs. Try before you buy.',
  footer_col1:    'Products',
  footer_col2:    'Free Tools',
  footer_col3:    'Help',
  footer_t1:      'Break-Even Calculator',
  footer_h1:      'How It Works',
  footer_h2:      'My Products',
  footer_h3:      'Support',
  footer_h4:      'Refund Policy',
  footer_p5:      'See all products →',
  footer_privacy: 'Privacy',
  footer_terms:   'Terms',
  footer_refund:  'Refund Policy',
  footer_copy:    '',

  // About
  about_eyebrow: 'Về tôi · About',
  about_h1:      'Finance tools built by someone who ran the numbers',
  about_sub:     "I build the dashboards I wish I'd had when I was running a small business.",
  about_cta:     'Get in touch',

  // Legal
  terms_h1:   'Terms of Service',
  privacy_h1: 'Privacy Policy',
  refund_h1:  'Refund Policy',
  refund_sub: 'We want you to be happy with your purchase. If you are not, we make it easy to get your money back.',

  // 404
  e404_h1:   'Page not found',
  e404_body: "The page you're looking for doesn't exist or has moved.",
  e404_home: 'Back to Home',
  e404_shop: 'Browse Products',

  // Rate pill
  rate_live: '1 USD ≈ {rate} VND · Live',
});

Object.assign(T.vi, {
  // Nav
  nav_cta: 'Xem tất cả sản phẩm',

  // Hero
  hero_eyebrow: 'Công cụ tài chính cho SME · Dùng thử trực tiếp · Không cần đăng ký',
  hero_live:    'Demo trực tiếp',
  hero_h1:      'Công Cụ Tài Chính <em>Doanh Nghiệp Bạn</em> Đang Thiếu',
  hero_sub:     'Dashboard và bảng tính thông minh — dùng thử trực tiếp bất kỳ sản phẩm nào trước khi mua. Không cần tài khoản.',
  hero_cta1:    'Xem danh mục sản phẩm',
  hero_cta2:    'Dùng thử miễn phí',
  hero_trust1:  'Nhìn thấy 13 tuần tới',
  hero_trust2:  'Dùng thử trước khi mua',
  hero_trust3:  'Nhận ngay sau khi thanh toán',
  hero_float_num: '4 tuần',
  hero_float_txt: 'cảnh báo sớm hơn bảng tính thủ công',
  dc_title:   'Dự báo dòng tiền 13 tuần — Demo',
  dc_alert:   'Tuần 9: Số dư tiền mặt âm (−4.200 USD)',
  dc_sub:     'Cần hành động ngay — còn 4 tuần để xử lý',
  dc_kpi1:    'Tiền mặt hiện tại',
  dc_kpi2:    'Đáy tuần 9',
  dc_kpi3:    'Tuần phục hồi',

  // How it works
  hiw_eyebrow:  'Cách hoạt động',
  hiw_h2:       'Dùng thử. Thấy hiệu quả. Rồi quyết định.',
  hiw_sub:      'Mỗi sản phẩm đều có thể dùng thử trước khi trả tiền.',
  hiw_s1_title: 'Dùng thử demo trực tiếp',
  hiw_s1_body:  'Mỗi sản phẩm có demo tương tác dùng ngay — không cần đăng ký, không cần email.',
  hiw_s2_title: 'Xem chính xác bạn sẽ nhận được gì',
  hiw_s2_body:  'Xem video hướng dẫn ngắn và đọc nội dung bên trong. Không có gì bí ẩn.',
  hiw_s3_title: 'Mua và nhận ngay lập tức',
  hiw_s3_body:  'Thanh toán một lần. Key bản quyền và link file sẽ đến hộp thư của bạn trong vòng 60 giây.',

  // Products
  prod_eyebrow: 'Sản phẩm của chúng tôi',
  prod_h2:      'Được xây dựng cho doanh nghiệp sử dụng bảng tính và dashboard hàng ngày.',
  prod_try:     'Dùng thử',
  prod_buy:     'Mua ngay',
  prod_see_all: 'Xem tất cả sản phẩm',

  // Catalog
  catalog_eyebrow: 'Tất cả sản phẩm',
  catalog_h1:      'Công cụ tài chính cho SME',
  catalog_sub:     'Mỗi sản phẩm đều có demo trực tiếp — dùng thử trước khi mua. Thanh toán một lần. Nhận ngay.',
  catalog_all:     'Tất cả',

  // Tool strip
  ts_label:       'Miễn phí · Không cần đăng ký',
  ts_h2:          'Tìm điểm hòa vốn trong 30 giây.',
  ts_body:        'Nhập chi phí cố định, giá bán và chi phí biến đổi. Nhận ngay số đơn vị và doanh thu hòa vốn — bằng USD hoặc VND.',
  ts_cta1:        'Dùng máy tính miễn phí',
  ts_cta2:        'Chia sẻ với nhóm →',
  ts_calc_title:  'Máy tính hòa vốn',
  ts_calc_f1:     'Chi phí cố định / tháng',
  ts_calc_f2:     'Giá bán / đơn vị',
  ts_calc_f3:     'Chi phí biến đổi / đơn vị',
  ts_calc_r1:     'Sản lượng hòa vốn',
  ts_calc_r2:     'Doanh thu hòa vốn',
  ts_calc_link:   'Dùng thử phiên bản đầy đủ →',

  // CTA
  cta_h2:   'Sẵn sàng thấy rõ con số của bạn chưa?',
  cta_body: 'Dùng thử bất kỳ sản phẩm nào. Chỉ trả tiền khi nó thực sự có ích. Nhận ngay sau khi mua.',
  cta_btn1: 'Xem danh mục sản phẩm',
  cta_btn2: 'Dùng thử miễn phí',
  cta_guar: 'Hoàn tiền 100% trong 14 ngày — không cần giải thích',

  // Free tool page
  ft_eyebrow:    'Miễn phí · Không cần đăng ký',
  ft_h1:         'Máy tính hòa vốn',
  ft_sub:        'Nhập 3 con số. Nhận ngay sản lượng và doanh thu hòa vốn — bằng USD hoặc VND.',
  ft_input_title: 'Số liệu của bạn',
  ft_f1:         'Chi phí cố định mỗi tháng',
  ft_f2:         'Giá bán mỗi đơn vị',
  ft_f3:         'Chi phí biến đổi mỗi đơn vị',
  ft_h1_hint:    'Tiền thuê, lương, phần mềm — chi phí không thay đổi dù bạn bán nhiều hay ít.',
  ft_h2_hint:    'Số tiền bạn thu từ một khách hàng mỗi lần bán.',
  ft_h3_hint:    'Nguyên liệu, vận chuyển hoặc hoa hồng trên mỗi đơn hàng.',
  ft_calc_btn:   'Tính ngay',
  ft_no_data:    'Chúng tôi không lưu dữ liệu của bạn.',
  ft_results_title: 'Điểm hòa vốn của bạn',
  ft_r1: 'Sản lượng hòa vốn / tháng',
  ft_r2: 'Doanh thu hòa vốn / tháng',
  ft_r3: 'Biên đóng góp / đơn vị',
  ft_r4: 'Tỷ lệ biên',
  ft_bar_lo: 'Biên thấp',
  ft_bar_hi: 'Biên cao',
  ft_email_h:    'Muốn có dashboard đầy đủ?',
  ft_email_body: 'Gửi kết quả của bạn và tôi sẽ gửi link đến bảng tính Hòa Vốn & Kịch Bản đầy đủ — bao gồm dự báo 12 tháng.',
  ft_email_btn:  'Gửi cho tôi công cụ',
  ft_email_ph:   'ban@email.com',
  ft_email_privacy: 'Không spam. Chỉ một email theo dõi. Hủy đăng ký bất kỳ lúc nào.',
  ft_faq_h: 'Câu hỏi thường gặp',
  ft_faq1_q: 'Điểm hòa vốn là gì?',
  ft_faq1_a: 'Điểm hòa vốn là số đơn vị bạn cần bán mỗi tháng để bắt đầu có lãi.',
  ft_faq2_q: 'Tại sao công thức dùng CEILING (làm tròn lên)?',
  ft_faq2_a: 'Vì bạn không thể bán một phần đơn vị — chúng tôi luôn làm tròn lên số nguyên kế tiếp.',
  ft_faq3_q: 'Tôi dùng được bằng VND không?',
  ft_faq3_a: 'Chuyển sang VND bằng nút chuyển tiền tệ. Kết quả sẽ tự động quy đổi theo tỷ giá thực tế.',
  ft_faq4_q: 'Biên đóng góp quá thấp thì sao?',
  ft_faq4_a: 'Biên thấp nghĩa là bạn cần doanh số rất cao. Giải pháp phổ biến: tăng giá, giảm chi phí biến đổi, hoặc cắt giảm chi phí cố định.',

  // Single product
  sp_demo_title: 'Dùng thử trực tiếp — không cần tài khoản',
  sp_demo_body:  'Demo tương tác với dữ liệu mẫu. Xem chính xác bạn sẽ nhận được gì trước khi mua.',
  sp_demo_btn:   'Mở demo trực tiếp →',

  // Footer
  footer_tagline: 'Dashboard tài chính và bảng tính thông minh cho SME. Dùng thử trước khi mua.',
  footer_col1:    'Sản phẩm',
  footer_col2:    'Công cụ miễn phí',
  footer_col3:    'Hỗ trợ',
  footer_t1:      'Máy tính hòa vốn',
  footer_h1:      'Cách hoạt động',
  footer_h2:      'Sản phẩm của tôi',
  footer_h3:      'Hỗ trợ',
  footer_h4:      'Chính sách hoàn tiền',
  footer_p5:      'Xem tất cả sản phẩm →',
  footer_privacy: 'Riêng tư',
  footer_terms:   'Điều khoản',
  footer_refund:  'Hoàn tiền',
  footer_copy:    '',

  // About
  about_eyebrow: 'Về tôi · About',
  about_h1:      'Công cụ tài chính được xây dựng bởi người từng chạy con số',
  about_sub:     'Tôi xây dựng những dashboard mà tôi ước mình có khi còn điều hành doanh nghiệp nhỏ.',
  about_cta:     'Liên hệ',

  // Legal
  terms_h1:   'Điều khoản dịch vụ',
  privacy_h1: 'Chính sách bảo mật',
  refund_h1:  'Chính sách hoàn tiền',
  refund_sub: 'Chúng tôi muốn bạn hài lòng với sản phẩm. Nếu không, chúng tôi sẽ hoàn tiền cho bạn dễ dàng.',

  // 404
  e404_h1:   'Không tìm thấy trang',
  e404_body: 'Trang bạn đang tìm không tồn tại hoặc đã được di chuyển.',
  e404_home: 'Về trang chủ',
  e404_shop: 'Xem sản phẩm',

  // Rate pill
  rate_live: '1 USD ≈ {rate} VND · Thực tế',
});

/* ================================================================
   STATE
   ================================================================ */
var currentLang     = localStorage.getItem('lx_lang')     || 'en';
var currentCurrency = localStorage.getItem('lx_currency') || 'usd';
var usdToVnd        = 25500; // fallback; updated by fetchRate()

/* ================================================================
   EXCHANGE RATE
   ================================================================ */
var RATE_KEY    = 'lx_rate';
var RATE_TS_KEY = 'lx_rate_ts';
var ONE_HOUR    = 3600 * 1000;

async function fetchRate() {
  var cached   = localStorage.getItem(RATE_KEY);
  var cachedTs = parseInt(localStorage.getItem(RATE_TS_KEY) || '0', 10);

  if (cached && (Date.now() - cachedTs < ONE_HOUR)) {
    usdToVnd = parseFloat(cached);
    renderRatePill();
    renderPrices();
    return;
  }

  // Try server-side cache first (WP AJAX)
  if (typeof LuxoraData !== 'undefined' && LuxoraData.ajaxUrl) {
    try {
      var resp = await fetch(LuxoraData.ajaxUrl + '?action=luxora_get_rate&nonce=' + LuxoraData.nonce);
      var json = await resp.json();
      if (json.success && json.data && json.data.rate) {
        usdToVnd = json.data.rate;
        localStorage.setItem(RATE_KEY, usdToVnd);
        localStorage.setItem(RATE_TS_KEY, Date.now());
        renderRatePill();
        renderPrices();
        return;
      }
    } catch (e) { /* fall through to direct fetch */ }
  }

  // Direct fetch from exchange rate API
  try {
    var res  = await fetch('https://open.er-api.com/v6/latest/USD');
    var data = await res.json();
    if (data.rates && data.rates.VND) {
      usdToVnd = Math.round(data.rates.VND);
      localStorage.setItem(RATE_KEY, usdToVnd);
      localStorage.setItem(RATE_TS_KEY, Date.now());
    }
  } catch (_) { /* keep fallback */ }

  renderRatePill();
  renderPrices();
}

function renderRatePill() {
  var pill = document.getElementById('rate-pill');
  if (!pill) return;
  var tpl = (T[currentLang].rate_live || '1 USD ≈ {rate} VND · Live');
  pill.textContent = tpl.replace('{rate}', new Intl.NumberFormat().format(usdToVnd));
}

/* ================================================================
   LANGUAGE
   ================================================================ */
function setLang(lang) {
  currentLang = lang;
  localStorage.setItem('lx_lang', lang);
  document.documentElement.setAttribute('data-lang', lang);

  document.querySelectorAll('[data-i18n]').forEach(function (el) {
    var key = el.getAttribute('data-i18n');
    if (T[lang] && T[lang][key] !== undefined) {
      el.innerHTML = T[lang][key];
    }
  });

  document.querySelectorAll('[data-i18n-placeholder]').forEach(function (el) {
    var key = el.getAttribute('data-i18n-placeholder');
    if (T[lang] && T[lang][key] !== undefined) {
      el.placeholder = T[lang][key];
    }
  });

  document.querySelectorAll('.toggle-lang').forEach(function (btn) {
    btn.classList.toggle('active', btn.dataset.value === lang);
  });

  renderRatePill();
}

/* ================================================================
   CURRENCY
   ================================================================ */
function setCurrency(cur) {
  currentCurrency = cur;
  localStorage.setItem('lx_currency', cur);
  document.documentElement.setAttribute('data-currency', cur);

  document.querySelectorAll('.toggle-cur').forEach(function (btn) {
    btn.classList.toggle('active', btn.dataset.value === cur);
  });

  renderRatePill();
  renderPrices();
  renderCalcPreview();
}

function renderPrices() {
  // Prices are controlled by CSS visibility (.price-usd / .price-vnd) via data-currency on <html>.
  // This hook can update any JS-generated price elements.
  renderCalcPreview();
}

/* ================================================================
   BREAK-EVEN CALCULATOR (tool-strip preview — static display)
   ================================================================ */
function renderCalcPreview() {
  var fc = 12500, sp = 80, vc = 40;
  var contribution = sp - vc;
  if (contribution <= 0) return;
  var units   = Math.ceil(fc / contribution);
  var revenue = units * sp;

  var r1 = document.getElementById('cp-r1');
  var r2 = document.getElementById('cp-r2');
  if (!r1 || !r2) return;

  if (currentCurrency === 'vnd') {
    r1.textContent = new Intl.NumberFormat('vi-VN').format(units) + ' đv';
    r2.textContent = new Intl.NumberFormat('vi-VN').format(Math.round(revenue * usdToVnd / 1000) * 1000) + ' ₫';
  } else {
    r1.textContent = units.toLocaleString() + ' units';
    r2.textContent = '$' + revenue.toLocaleString();
  }
}

/* ================================================================
   BREAK-EVEN CALCULATOR (full tool on template-freetool.php)
   ================================================================ */
function initCalc() {
  var btn         = document.getElementById('calc-btn');
  var resultsCard = document.getElementById('results-card');
  var emailBand   = document.getElementById('email-capture');
  var explanation = document.getElementById('results-explanation');

  if (!btn || !resultsCard) return;

  btn.addEventListener('click', calculate);
  ['fc', 'sp', 'vc'].forEach(function (id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('keypress', function (e) { if (e.key === 'Enter') calculate(); });
  });

  function calculate() {
    var fc = parseFloat(document.getElementById('fc').value) || 0;
    var sp = parseFloat(document.getElementById('sp').value) || 0;
    var vc = parseFloat(document.getElementById('vc').value) || 0;

    if (fc <= 0 || sp <= 0 || vc < 0 || sp <= vc) {
      resultsCard.classList.remove('visible');
      return;
    }

    var contribution = sp - vc;
    var units        = Math.ceil(fc / contribution);
    var revenue      = units * sp;
    var marginRate   = contribution / sp;

    var fmtNum = function (n) {
      if (currentCurrency === 'vnd') {
        return new Intl.NumberFormat('vi-VN').format(Math.round(n * usdToVnd / 1000) * 1000) + ' ₫';
      }
      return '$' + n.toLocaleString();
    };
    var fmtUnits = function (n) {
      var suffix = currentCurrency === 'vnd' ? ' đv' : ' units';
      return new Intl.NumberFormat().format(n) + suffix;
    };

    document.getElementById('r-units').textContent   = fmtUnits(units);
    document.getElementById('r-revenue').textContent = fmtNum(revenue);
    document.getElementById('r-margin').textContent  = fmtNum(contribution);
    document.getElementById('r-rate').textContent    = (marginRate * 100).toFixed(1) + '%';

    var bar = document.getElementById('margin-bar');
    if (bar) bar.style.width = Math.min(marginRate * 100, 100) + '%';

    resultsCard.classList.add('visible');

    // Show explanation
    if (explanation) {
      var exTxt = currentLang === 'vi'
        ? 'Mỗi lần bán, bạn kiếm được ' + fmtNum(contribution) + ' để trả chi phí cố định. Bạn cần ' + fmtUnits(units) + ' mỗi tháng để hòa vốn.'
        : 'Each sale contributes ' + fmtNum(contribution) + ' toward your fixed costs. You need ' + fmtUnits(units) + ' per month to break even.';
      explanation.innerHTML = exTxt;
      explanation.classList.add('visible');
    }

    // Show email capture after first calculation
    if (emailBand) {
      emailBand.classList.add('visible');
    }
  }
}

/* ================================================================
   EMAIL CAPTURE (Brevo / generic fetch)
   ================================================================ */
function initEmailCapture() {
  var btn   = document.getElementById('capture-submit');
  var input = document.getElementById('capture-email');
  if (!btn || !input) return;

  btn.addEventListener('click', function () {
    var email = input.value.trim();
    if (!email || !email.includes('@')) {
      input.style.borderColor = 'var(--loss)';
      return;
    }
    input.style.borderColor = '';
    btn.textContent = currentLang === 'vi' ? 'Đang gửi...' : 'Sending...';
    btn.disabled = true;

    // TODO: replace with your Brevo / ConvertKit API endpoint + key
    // Example Brevo:
    // fetch('https://api.brevo.com/v3/contacts', {
    //   method: 'POST',
    //   headers: { 'api-key': 'YOUR_BREVO_KEY', 'Content-Type': 'application/json' },
    //   body: JSON.stringify({ email, listIds: [3] })
    // })

    setTimeout(function () {
      var parent = btn.closest('.email-capture-band');
      if (parent) {
        parent.innerHTML = '<p style="text-align:center;color:var(--teal);font-weight:600;font-family:var(--font-heading);">'
          + (currentLang === 'vi' ? '✓ Đã gửi! Kiểm tra hộp thư của bạn.' : '✓ Sent! Check your inbox.')
          + '</p>';
      }
    }, 800);
  });
}

/* ================================================================
   FAQ ACCORDION
   ================================================================ */
function initFaq() {
  document.querySelectorAll('.faq-question').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.closest('.faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item.open').forEach(function (i) { i.classList.remove('open'); });
      if (!isOpen) item.classList.add('open');
      btn.setAttribute('aria-expanded', !isOpen);
    });
  });
}

/* ================================================================
   MOBILE MENU
   ================================================================ */
function initMobileMenu() {
  var toggle = document.getElementById('menu-toggle');
  var nav    = document.getElementById('nav-mobile');
  if (!toggle || !nav) return;

  toggle.addEventListener('click', function () {
    var isOpen = nav.classList.toggle('open');
    toggle.setAttribute('aria-expanded', isOpen);
    nav.setAttribute('aria-expanded', isOpen);
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      nav.classList.remove('open');
      toggle.setAttribute('aria-expanded', 'false');
    }
  });
}

/* ================================================================
   HEADER SCROLL EFFECT
   ================================================================ */
function initHeaderScroll() {
  var header = document.getElementById('site-header');
  if (!header) return;
  window.addEventListener('scroll', function () {
    header.classList.toggle('is-scrolled', window.scrollY > 10);
  }, { passive: true });
}

/* ================================================================
   INIT
   ================================================================ */
document.addEventListener('DOMContentLoaded', function () {
  setLang(currentLang);
  setCurrency(currentCurrency);
  fetchRate();
  initCalc();
  initEmailCapture();
  initFaq();
  initMobileMenu();
  initHeaderScroll();
  renderCalcPreview();
});
