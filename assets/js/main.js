/**
 * LUXORA — main.js
 * Handles: language toggle, currency toggle, exchange rate API, scroll effects.
 * WP conversion: enqueue via wp_enqueue_script('luxora-main', ...)
 */

/* ============================================================
   TRANSLATIONS
   ============================================================ */
const T = {
  en: {
    // Meta
    page_title: 'Luxora — Finance Tools for SMEs | Try Before You Buy',

    // Nav
    nav_products:    'Products',
    nav_tool:        'Free Tool',
    nav_hiw:         'How It Works',
    nav_support:     'Support',
    nav_cta:         'See All Products',
    nav_my_products: 'My Products',
    nav_cart:        'Cart',

    // Rate pill
    rate_label: '1 USD ≈ {rate} VND · Live',
    rate_error: 'Rate unavailable',

    // Hero
    hero_eyebrow:  'Finance tools for SMEs · Try live · No signup required',
    hero_live:     'Live demo',
    hero_h1:       'The Finance Tools <em>Your Business</em> Has Been Missing',
    hero_sub:      'Interactive dashboards and smart spreadsheets — try any product live before you buy. No account needed.',
    hero_cta1:     'Browse the Catalog',
    hero_cta2:     'Try the Free Tool',
    hero_trust1:   '13-week cash visibility',
    hero_trust2:   'Try before you buy',
    hero_trust3:   'Instant access after purchase',
    hero_float_num: '4 weeks',
    hero_float_txt: 'earlier warning than manual spreadsheets',

    // Dashboard mockup
    dc_title:  '13-Week Cash Flow Forecast — Demo',
    dc_alert:  'Week 9: Cash balance goes negative (−$4,200)',
    dc_sub:    'Action needed — 4 weeks remaining to act',
    dc_kpi1:   'Current cash',
    dc_kpi2:   'Week 9 low',
    dc_kpi3:   'Recovery week',

    // How it works
    hiw_eyebrow: 'How it works',
    hiw_h2:      'Try it. See it work. Then decide.',
    hiw_sub:     'Every product is interactive before you pay a cent.',
    hiw_s1_title: 'Try the live demo',
    hiw_s1_body:  'Every product has a live, interactive demo you can use right now — no signup, no email required.',
    hiw_s2_title: 'See exactly what you get',
    hiw_s2_body:  'Watch a short walkthrough video and read what\'s inside. No guessing what you\'re buying.',
    hiw_s3_title: 'Buy and get instant access',
    hiw_s3_body:  'Pay once. Your license key, file link, or dashboard copy arrives in your inbox in under 60 seconds.',

    // Proof
    proof_eyebrow:  'See it in action',
    proof_h2:       'This is what the product actually does.',
    proof_body1:    'The 13-Week Cash Flow Forecast flagged Week 9 as critical — when the demo company\'s cash balance would turn negative. The alert triggered in Week 5, giving the business owner 4 weeks to act.',
    proof_body2:    'Delay a purchase. Accelerate a collection. Arrange a credit line. Four weeks is enough time — if you know in advance.',
    proof_cap_label: 'Live demo result',
    proof_caption:  'This is the week the model detected the demo business was about to go cash-negative — 4 weeks before it happened.',
    proof_disc_title: 'Demo result — not a customer quote',
    proof_disc_body:  'Numbers shown are real outputs from the tool on a sample business. We built this to show you what the product does, not to fabricate social proof.',
    proof_cta: 'Try the demo yourself →',

    // Products
    prod_eyebrow: 'Our tools',
    prod_h2:      'Built for businesses that run on spreadsheets and dashboards.',
    prod_see_all: 'See all products →',
    prod_try:     'Try demo',
    prod_buy:     'Buy',
    prod_one_time: 'one-time',

    // Product 1
    p1_name:    '13-Week Cash Flow Forecast',
    p1_benefit: 'See your cash in vs. out, week by week, for 13 weeks — and get flagged the exact week you\'re about to run short.',
    p1_type:    'Sheet Tool',

    // Product 2 (placeholder)
    p2_name:    'Monthly P&L Dashboard',
    p2_benefit: 'One-page view of your revenue, costs, gross margin, and net profit — every month, automatically.',
    p2_type:    'Dashboard',

    // Product 3 (placeholder)
    p3_name:    'Expense Tracker & Budget Planner',
    p3_benefit: 'Log expenses, set monthly budgets by category, and see instantly where you\'re over or under.',
    p3_type:    'Sheet Tool',

    // Free tool strip
    ts_label:  'Free · No signup needed',
    ts_h2:     'Find your break-even point in 30 seconds.',
    ts_body:   'Enter your fixed costs, selling price, and variable cost. Get your break-even units and revenue instantly — in USD or VND.',
    ts_cta1:   'Use the free calculator',
    ts_cta2:   'Share with your team →',
    ts_calc_title:  'Break-Even Calculator',
    ts_calc_f1:     'Fixed costs / month',
    ts_calc_f2:     'Selling price / unit',
    ts_calc_f3:     'Variable cost / unit',
    ts_calc_r1:     'Break-even units',
    ts_calc_r2:     'Break-even revenue',
    ts_calc_link:   'Try the full version →',

    // Final CTA
    cta_h2:    'Ready to see your numbers clearly?',
    cta_body:  'Try any product live. Pay only if it works for you. Instant access after purchase.',
    cta_btn1:  'Browse the Catalog',
    cta_btn2:  'Try the Free Tool',
    cta_guar:  '14-day money-back guarantee — no questions asked',

    // Footer
    footer_tagline: 'Finance dashboards and smart spreadsheets for SMEs. Try before you buy.',
    footer_contact: 'Support: luxora@luxorasystem.com',
    footer_col1:    'Products',
    footer_col2:    'Free Tools',
    footer_col3:    'Help',
    footer_col4:    'Legal',
    footer_copy:    '© 2025 Luxora. All rights reserved.',
    footer_privacy: 'Privacy',
    footer_terms:   'Terms',
    footer_refund:  'Refund Policy',

    footer_p1: '13-Week Cash Flow Forecast',
    footer_p2: 'Monthly P&L Dashboard',
    footer_p3: 'Expense Tracker',
    footer_p4: 'Business Finance OS',
    footer_p5: 'See all products',
    footer_t1: 'Break-Even Calculator',
    footer_h1: 'How It Works',
    footer_h2: 'My Products',
    footer_h3: 'Support',
    footer_h4: 'Refund Policy',
  },

  vi: {
    page_title: 'Luxora — Công cụ tài chính cho SME | Thử trước, mua sau',

    nav_products:    'Sản phẩm',
    nav_tool:        'Công cụ miễn phí',
    nav_hiw:         'Cách hoạt động',
    nav_support:     'Hỗ trợ',
    nav_cta:         'Xem tất cả sản phẩm',
    nav_my_products: 'Sản phẩm của tôi',
    nav_cart:        'Giỏ hàng',

    rate_label: '1 USD ≈ {rate} VND · Cập nhật tự động',
    rate_error: 'Không thể tải tỷ giá',

    hero_eyebrow:  'Công cụ tài chính cho SME · Thử trực tiếp · Không cần đăng ký',
    hero_live:     'Demo trực tiếp',
    hero_h1:       'Công cụ tài chính mà <em>doanh nghiệp bạn</em> đang cần',
    hero_sub:      'Dashboard và bảng tính thông minh — thử bất kỳ sản phẩm nào trực tiếp trước khi mua. Không cần tài khoản.',
    hero_cta1:     'Xem tất cả sản phẩm',
    hero_cta2:     'Dùng công cụ miễn phí',
    hero_trust1:   'Nhìn thấy dòng tiền 13 tuần tới',
    hero_trust2:   'Thử trước, mua sau',
    hero_trust3:   'Truy cập ngay sau thanh toán',
    hero_float_num: '4 tuần',
    hero_float_txt: 'cảnh báo sớm hơn so với bảng tính thủ công',

    dc_title:  'Dự báo dòng tiền 13 tuần — Demo',
    dc_alert:  'Tuần 9: Số dư tiền mặt xuống âm (−120,000,000đ)',
    dc_sub:    'Cần hành động — còn 4 tuần để xử lý',
    dc_kpi1:   'Tiền mặt hiện tại',
    dc_kpi2:   'Mức thấp tuần 9',
    dc_kpi3:   'Tuần phục hồi',

    hiw_eyebrow: 'Cách hoạt động',
    hiw_h2:      'Thử trước. Thấy kết quả. Rồi quyết định.',
    hiw_sub:     'Mọi sản phẩm đều có thể tương tác trước khi bạn trả bất kỳ đồng nào.',
    hiw_s1_title: 'Thử demo trực tiếp',
    hiw_s1_body:  'Mỗi sản phẩm có demo tương tác ngay trên trang — không cần đăng ký, không cần email.',
    hiw_s2_title: 'Xem chính xác những gì bạn nhận được',
    hiw_s2_body:  'Xem video hướng dẫn ngắn và danh sách nội dung chi tiết. Không đoán mò về sản phẩm.',
    hiw_s3_title: 'Mua và truy cập ngay lập tức',
    hiw_s3_body:  'Thanh toán một lần. License key, link file hoặc bản sao dashboard đến hộp thư của bạn trong 60 giây.',

    proof_eyebrow:  'Xem sản phẩm hoạt động',
    proof_h2:       'Đây là những gì sản phẩm thực sự làm được.',
    proof_body1:    'Mô hình dự báo dòng tiền 13 tuần xác định Tuần 9 là điểm nguy hiểm — khi số dư tiền mặt của doanh nghiệp mẫu sẽ xuống âm. Cảnh báo kích hoạt từ Tuần 5, cho chủ doanh nghiệp 4 tuần để hành động.',
    proof_body2:    'Trì hoãn một khoản chi. Đẩy nhanh thu hồi công nợ. Thu xếp hạn mức tín dụng. Bốn tuần là đủ — nếu bạn biết trước.',
    proof_cap_label: 'Kết quả demo',
    proof_caption:  'Đây là tuần mô hình phát hiện doanh nghiệp mẫu sắp âm tiền — trước 4 tuần.',
    proof_disc_title: 'Kết quả demo — không phải lời khách hàng',
    proof_disc_body:  'Các con số hiển thị là đầu ra thực từ công cụ trên dữ liệu mẫu. Chúng tôi xây dựng phần này để cho bạn thấy sản phẩm làm gì, không phải để tạo ra bằng chứng xã hội giả mạo.',
    proof_cta: 'Tự mình thử demo →',

    prod_eyebrow: 'Sản phẩm của chúng tôi',
    prod_h2:      'Được xây dựng cho doanh nghiệp vận hành bằng bảng tính và dashboard.',
    prod_see_all: 'Xem tất cả sản phẩm →',
    prod_try:     'Thử demo',
    prod_buy:     'Mua ngay',
    prod_one_time: 'một lần',

    p1_name:    'Dự báo dòng tiền 13 tuần',
    p1_benefit: 'Theo dõi tiền vào – ra, từng tuần trong 13 tuần — được gắn cờ đúng tuần bạn sắp thiếu tiền.',
    p1_type:    'Công cụ Sheets',

    p2_name:    'Dashboard Lãi & Lỗ hàng tháng',
    p2_benefit: 'Nhìn thấy doanh thu, chi phí, biên lợi nhuận gộp và lợi nhuận ròng trong một trang — cập nhật tự động.',
    p2_type:    'Dashboard',

    p3_name:    'Theo dõi chi phí & Lập ngân sách',
    p3_benefit: 'Ghi lại chi phí, đặt ngân sách hàng tháng theo danh mục, và xem ngay mình đang vượt hay thiếu kế hoạch.',
    p3_type:    'Công cụ Sheets',

    ts_label:  'Miễn phí · Không cần đăng ký',
    ts_h2:     'Tính điểm hòa vốn trong 30 giây.',
    ts_body:   'Nhập chi phí cố định, giá bán và chi phí biến đổi. Nhận điểm hòa vốn (đơn vị và doanh thu) ngay lập tức — theo USD hoặc VND.',
    ts_cta1:   'Dùng công cụ miễn phí',
    ts_cta2:   'Chia sẻ với nhóm →',
    ts_calc_title:  'Máy tính điểm hòa vốn',
    ts_calc_f1:     'Chi phí cố định / tháng',
    ts_calc_f2:     'Giá bán / đơn vị',
    ts_calc_f3:     'Chi phí biến đổi / đơn vị',
    ts_calc_r1:     'Điểm hòa vốn (đơn vị)',
    ts_calc_r2:     'Doanh thu hòa vốn',
    ts_calc_link:   'Thử phiên bản đầy đủ →',

    cta_h2:    'Sẵn sàng nhìn thấy con số rõ ràng chưa?',
    cta_body:  'Thử bất kỳ sản phẩm nào trực tiếp. Chỉ trả tiền nếu phù hợp với bạn. Truy cập ngay sau thanh toán.',
    cta_btn1:  'Xem tất cả sản phẩm',
    cta_btn2:  'Dùng công cụ miễn phí',
    cta_guar:  'Bảo đảm hoàn tiền 14 ngày — không cần giải thích',

    footer_tagline: 'Dashboard tài chính và bảng tính thông minh cho SME. Thử trước, mua sau.',
    footer_contact: 'Hỗ trợ: luxora@luxorasystem.com',
    footer_col1:    'Sản phẩm',
    footer_col2:    'Công cụ miễn phí',
    footer_col3:    'Hỗ trợ',
    footer_col4:    'Pháp lý',
    footer_copy:    '© 2025 Luxora. Bảo lưu mọi quyền.',
    footer_privacy: 'Bảo mật',
    footer_terms:   'Điều khoản',
    footer_refund:  'Chính sách hoàn tiền',

    footer_p1: 'Dự báo dòng tiền 13 tuần',
    footer_p2: 'Dashboard Lãi & Lỗ',
    footer_p3: 'Theo dõi chi phí',
    footer_p4: 'Hệ thống tài chính Notion',
    footer_p5: 'Xem tất cả',
    footer_t1: 'Máy tính điểm hòa vốn',
    footer_h1: 'Cách hoạt động',
    footer_h2: 'Sản phẩm của tôi',
    footer_h3: 'Hỗ trợ',
    footer_h4: 'Chính sách hoàn tiền',
  }
};

/* ============================================================
   STATE
   ============================================================ */
let currentLang     = localStorage.getItem('lx_lang')     || 'en';
let currentCurrency = localStorage.getItem('lx_currency') || 'usd';
let usdToVnd        = 25500; // fallback

/* ============================================================
   EXCHANGE RATE
   ============================================================ */
async function fetchRate() {
  const CACHE_KEY = 'lx_rate';
  const CACHE_TS  = 'lx_rate_ts';
  const ONE_HOUR  = 3600 * 1000;

  const cachedRate = localStorage.getItem(CACHE_KEY);
  const cachedTs   = parseInt(localStorage.getItem(CACHE_TS) || '0', 10);

  if (cachedRate && (Date.now() - cachedTs < ONE_HOUR)) {
    usdToVnd = parseFloat(cachedRate);
    renderRatePill();
    renderPrices();
    return;
  }

  try {
    const res  = await fetch('https://open.er-api.com/v6/latest/USD');
    const data = await res.json();
    usdToVnd   = Math.round(data.rates.VND);
    localStorage.setItem(CACHE_KEY, usdToVnd);
    localStorage.setItem(CACHE_TS, Date.now());
  } catch (_) {
    // keep fallback
  }
  renderRatePill();
  renderPrices();
}

function renderRatePill() {
  const el = document.getElementById('rate-pill');
  if (!el) return;
  const tpl = T[currentLang].rate_label;
  el.textContent = tpl.replace('{rate}', usdToVnd.toLocaleString());
  el.style.display = currentCurrency === 'vnd' ? 'flex' : 'none';
}

/* ============================================================
   PRICES
   ============================================================ */
const PRICES_USD = { p1: 39, p2: 49, p3: 29, p4: 35 };

function fmtUsd(n)  { return `$${n}`; }
function fmtVnd(n)  {
  const vnd = n * usdToVnd;
  return new Intl.NumberFormat('vi-VN').format(Math.round(vnd / 1000) * 1000) + ' ₫';
}

function renderPrices() {
  document.querySelectorAll('[data-price-id]').forEach(el => {
    const id  = el.getAttribute('data-price-id');
    const usd = PRICES_USD[id];
    if (!usd) return;
    if (currentCurrency === 'usd') {
      el.textContent = fmtUsd(usd);
    } else {
      el.textContent = fmtVnd(usd);
    }
  });
}

/* ============================================================
   LANGUAGE
   ============================================================ */
function setLang(lang) {
  currentLang = lang;
  localStorage.setItem('lx_lang', lang);
  document.documentElement.setAttribute('data-lang', lang);

  // Update all [data-i18n] elements
  document.querySelectorAll('[data-i18n]').forEach(el => {
    const key = el.getAttribute('data-i18n');
    if (T[lang][key] !== undefined) {
      el.innerHTML = T[lang][key];
    }
  });

  // Update toggle button states
  document.querySelectorAll('.toggle-lang').forEach(btn => {
    btn.classList.toggle('active', btn.dataset.value === lang);
  });

  // Update page title
  document.title = T[lang].page_title;

  // Update rate pill wording
  renderRatePill();
  renderCalcPreview();
}

/* ============================================================
   CURRENCY
   ============================================================ */
function setCurrency(cur) {
  currentCurrency = cur;
  localStorage.setItem('lx_currency', cur);
  document.documentElement.setAttribute('data-currency', cur);

  document.querySelectorAll('.toggle-cur').forEach(btn => {
    btn.classList.toggle('active', btn.dataset.value === cur);
  });

  renderRatePill();
  renderPrices();
  renderCalcPreview();
}

/* ============================================================
   CALC PREVIEW (mini, in the strip)
   ============================================================ */
function renderCalcPreview() {
  const prefix = currentCurrency === 'usd' ? '$' : '₫';
  const units  = 312;
  const rev    = 15600;

  const prefixEls = document.querySelectorAll('.cp-prefix');
  prefixEls.forEach(el => { el.textContent = prefix; });

  const r1 = document.getElementById('cp-r1');
  const r2 = document.getElementById('cp-r2');
  if (r1) r1.textContent = `${units.toLocaleString()} units`;
  if (r2) r2.textContent = currentCurrency === 'usd'
    ? fmtUsd(rev)
    : fmtVnd(rev);
}

/* ============================================================
   SCROLL — sticky header shadow
   ============================================================ */
function initScrollHeader() {
  const header = document.querySelector('.site-header');
  if (!header) return;
  const onScroll = () => {
    header.classList.toggle('is-scrolled', window.scrollY > 8);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
}

/* ============================================================
   MOBILE MENU (simple toggle — expand later)
   ============================================================ */
function initMobileMenu() {
  const toggle = document.getElementById('mobile-menu-toggle');
  const menu   = document.getElementById('mobile-menu');
  if (!toggle || !menu) return;
  toggle.addEventListener('click', () => {
    const open = menu.getAttribute('aria-expanded') === 'true';
    menu.setAttribute('aria-expanded', String(!open));
    menu.classList.toggle('open', !open);
  });
}

/* ============================================================
   SMOOTH ANCHOR SCROLL
   ============================================================ */
function initSmoothAnchors() {
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
}

/* ============================================================
   INIT
   ============================================================ */
document.addEventListener('DOMContentLoaded', () => {
  // Set initial state from localStorage
  document.documentElement.setAttribute('data-lang', currentLang);
  document.documentElement.setAttribute('data-currency', currentCurrency);

  // Sync toggle button active states
  document.querySelectorAll('.toggle-lang').forEach(btn => {
    btn.classList.toggle('active', btn.dataset.value === currentLang);
  });
  document.querySelectorAll('.toggle-cur').forEach(btn => {
    btn.classList.toggle('active', btn.dataset.value === currentCurrency);
  });

  // Apply language strings
  setLang(currentLang);

  // Fetch exchange rate
  fetchRate();

  // Init behaviors
  initScrollHeader();
  initMobileMenu();
  initSmoothAnchors();
  renderCalcPreview();
});
