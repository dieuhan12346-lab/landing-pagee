/* ============ ROUTER ============ */
const pages = ['home','about','services','listings','contact','module'];
const titles = {
  home:'Luxora — FP&A and Operating Automation Software',
  about:'About — Luxora | The Operating System for Finance Teams',
  services:'Services — FP&A and Operating Automation | Luxora',
  listings:'Our Work — Automation in Production | Luxora',
  contact:'Contact — Luxora'
};
const navLinks = document.getElementById('navLinks');
const menuToggle = document.getElementById('menuToggle');

function showPage(id, docTitle){
  if(!pages.includes(id)) id='home';
  document.querySelectorAll('.page').forEach(p=>p.classList.remove('active'));
  const page=document.getElementById('page-'+id);
  page.classList.add('active');
  document.title=docTitle||titles[id];
  // nav active state — module detail pages keep Listings highlighted
  const navId = id==='module' ? 'listings' : id;
  document.querySelectorAll('.nav-links a').forEach(a=>{
    a.classList.toggle('active', a.getAttribute('href')==='#'+navId);
  });
  window.scrollTo({top:0,behavior:'instant' in window ? 'instant':'auto'});
  // close mobile menu
  navLinks.classList.remove('open');
  menuToggle.classList.remove('open');
  menuToggle.setAttribute('aria-expanded','false');
  // trigger reveals + counters for this page
  initReveal(page);
  runCounters(page);
}

function routeFromHash(){
  const id=(location.hash||'#home').replace('#','');
  if(id.indexOf('module-')===0){
    const key=id.slice(7);
    if(MODULES[key]){
      renderModulePage(key);
      showPage('module', MODULES[key].name+' — Module | Luxora');
      return;
    }
    showPage('listings');
    return;
  }
  showPage(id);
}
window.addEventListener('hashchange',routeFromHash);

// intercept in-page hash links for smoothness (delegated — module pages render late)
document.addEventListener('click',e=>{
  const a=e.target.closest && e.target.closest('a[data-link]');
  if(!a) return;
  const href=a.getAttribute('href');
  if(href && href.startsWith('#')){
    e.preventDefault();
    if(location.hash===href){ routeFromHash(); }
    else location.hash=href;
  }
});

/* ============ MOBILE MENU ============ */
menuToggle.addEventListener('click',()=>{
  const open=navLinks.classList.toggle('open');
  menuToggle.classList.toggle('open',open);
  menuToggle.setAttribute('aria-expanded',open);
});

/* ============ REVEAL ON SCROLL ============ */
let observer;
function initReveal(scope){
  const els=(scope||document).querySelectorAll('.reveal:not(.in)');
  if(!observer){
    observer=new IntersectionObserver((entries)=>{
      entries.forEach(en=>{
        if(en.isIntersecting){ en.target.classList.add('in'); observer.unobserve(en.target); }
      });
    },{threshold:.12,rootMargin:'0px 0px -40px 0px'});
  }
  els.forEach((el,i)=>{
    el.style.transitionDelay=(Math.min(i,6)*60)+'ms';
    observer.observe(el);
  });
}

/* ============ COUNTERS ============ */
function runCounters(scope){
  (scope||document).querySelectorAll('[data-count]').forEach(el=>{
    if(el.dataset.done) return;
    el.dataset.done='1';
    const target=parseFloat(el.dataset.count);
    const suffix=el.dataset.suffix||'';
    const dur=1400; const start=performance.now();
    function tick(now){
      const p=Math.min((now-start)/dur,1);
      const eased=1-Math.pow(1-p,3);
      const val=Math.round(target*eased);
      el.textContent=val+suffix;
      if(p<1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  });
}

/* ============ LISTINGS FILTER ============ */
const filterBar=document.getElementById('filterBar');
if(filterBar){
  filterBar.addEventListener('click',e=>{
    const btn=e.target.closest('button'); if(!btn) return;
    filterBar.querySelectorAll('button').forEach(b=>b.classList.remove('active'));
    btn.classList.add('active');
    const f=btn.dataset.filter;
    document.querySelectorAll('#cardGrid .card').forEach(c=>{
      const show = f==='all' || c.dataset.cat.split(' ').includes(f);
      c.style.display=show?'flex':'none';
    });
  });
}

/* ============ FAQ ============ */
document.querySelectorAll('.faq-q').forEach(q=>{
  q.addEventListener('click',()=>{
    const item=q.parentElement;
    const open=item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(i=>{
      i.classList.remove('open');
      i.querySelector('.faq-a').style.maxHeight=null;
    });
    if(!open){
      item.classList.add('open');
      const a=item.querySelector('.faq-a');
      a.style.maxHeight=a.scrollHeight+'px';
    }
  });
});

/* ============ CONTACT FORM ============ */
const form=document.getElementById('contactForm');
if(form){
  const success=document.getElementById('formSuccess');
  form.addEventListener('submit',e=>{
    e.preventDefault();
    let ok=true;
    const checks=[
      ['f-name', v=>v.trim().length>1],
      ['f-email', v=>/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim())],
      ['f-phone', v=>v.trim().length>5],
      ['f-message', v=>v.trim().length>3]
    ];
    checks.forEach(([id,test])=>{
      const field=document.getElementById(id);
      const input=field.querySelector('input,textarea');
      if(!test(input.value)){ field.classList.add('err'); ok=false; }
      else field.classList.remove('err');
    });
    if(ok){
      form.reset();
      success.classList.add('show');
      success.scrollIntoView({behavior:'smooth',block:'center'});
      setTimeout(()=>success.classList.remove('show'),6000);
    }
  });
  form.querySelectorAll('input,textarea').forEach(inp=>{
    inp.addEventListener('input',()=>inp.closest('.field').classList.remove('err'));
  });
}

/* ============ MODULE DETAIL PAGES ============ */
const MODULES = {
  'cash-flow': {
    name: 'Cash Flow',
    tag: 'FP&A',
    shot: 'cash-flow.png',
    intro: 'See where your cash lands over the next 13 weeks — not as one hopeful line, but as a range with real odds. Every run simulates 1,400 scenarios, so each week gets a P10–P90 confidence band and an honest probability of going cash-negative. When that probability climbs, Luxora tells you which customers to chase to pull it back down.',
    steps: [
      ['Enter your data', 'Open <b>Enter data</b> and add your opening balance, receivables (who owes you) and payables — grouped as supplier, payroll, tax or other.'],
      ['Read the forecast', 'The gold line is the expected case (P50); the shaded band is the P10–P90 range. The banner up top names the riskiest week and the expected trough.'],
      ['Stress-test it', 'Switch between Normal, Slowdown, Recession and Liquidity shock — or drag the sliders in Custom to model your own downturn.'],
      ['Take the collection plan', 'Luxora picks the smallest set of customers to chase that brings deficit risk under your threshold. Tick them off as you collect.'],
      ['Export', 'Send the whole picture to Excel, or generate the PDF report for your board or bank.']
    ]
  },
  'invoice-reader': {
    name: 'Invoice Reader',
    tag: 'Bookkeeping',
    shot: 'invoice-reader.png',
    intro: 'Turn the invoice list your accounting software already exports into posted journal entries — without retyping anything. Luxora detects the header row, maps the columns, posts each invoice under your company standard (Circular 200 or IFRS), and checks every line for the errors that usually slip through.',
    steps: [
      ['Upload the file', 'Drop in an Excel or CSV invoice listing exported from your accounting software. Columns are detected automatically, in English or Vietnamese — no template to fill in.'],
      ['Check the parse', 'Luxora shows how many invoices it read, which header row it used and how many columns it mapped, so you can confirm before trusting it.'],
      ['Review the entries', 'Click any invoice to see its journal entry. The debit account follows the payment method: cash to 111, bank transfer to 112, on credit to 131.'],
      ['Watch the flags', 'Each line is checked: total = net + tax, tax ID valid, rate in {0, 5, 8, 10}%, tax = net x rate, and amount = qty x unit price.'],
      ['It feeds cash flow', 'Credit-sale invoices become receivables in the Cash Flow module automatically, dated 30 days out — no double entry.']
    ]
  },
  'fpa-automation': {
    name: 'FP&A Automation',
    tag: 'FP&A',
    shot: 'fpa-automation.png',
    intro: 'The planning layer that replaces the manual Excel cycle: machine-learning forecasting on your time series blended with macro signals, automatic multi-scenario analysis, and risk detection that flags trouble 30–60 days before it lands.',
    steps: [
      ['Smart forecast', 'An LSTM time-series model combines your history with macro signals such as inflation and interest rates. The shaded band widens further out — honest about growing uncertainty.'],
      ['Compare scenarios', 'Best-case, Base-case and Stress-test run side by side, each with its own trough and the week it happens.'],
      ['Catch risk early', 'Overdue receivables, abnormal cost spikes and thinning liquidity are surfaced as alerts before they become a cash problem.'],
      ['Act on the alert', 'Each alert carries the amount at stake and a suggested window to act, so it turns into a task rather than a number on a slide.']
    ]
  },
  'auto-collections': {
    name: 'Auto Collections',
    tag: 'Operations',
    shot: 'auto-collections.png',
    intro: 'Chasing overdue invoices is repetitive, awkward and easy to postpone. Luxora drafts the message for you — pitched at the right level of firmness for how late the debt is — and schedules the follow-ups so nothing is quietly dropped.',
    steps: [
      ['Pick a debtor', 'The list is sorted by urgency, showing days overdue, the amount and the estimated probability of recovery.'],
      ['Choose the channel', 'Email, Zalo or SMS. The draft is rewritten to suit the channel — short for SMS, fuller for email.'],
      ['Let the tone match the delay', 'Gentle under 25 days, firm from 25, urgent past 45 — with a formal demand and a stated consequence at the top tier.'],
      ['Language follows the profile', 'Vietnamese companies get Vietnamese drafts; profiles set to another country get English.'],
      ['Schedule the escalation', 'Auto-schedule sets the ladder: first reminder today, SMS if unpaid in 3 days, escalate to a phone call at 7.']
    ]
  },
  'credit-scoring': {
    name: 'Credit Scoring',
    tag: 'FP&A',
    shot: 'credit-scoring.png',
    intro: 'Before you extend credit to a B2B partner, know what you are taking on. Luxora scores each partner out of 100 from their financials, payment history and industry data — and shows you exactly which factors drove the score, with the weight each one carried.',
    steps: [
      ['Select a partner', 'Each partner shows their industry, revenue and the credit limit they are asking for.'],
      ['Run the score', 'Press <b>Score</b> to aggregate financial reports, payment history and industry data into a single grade — AA down to B.'],
      ['Read why', 'Liquidity, leverage, payment history, industry health and size each get a sub-score and a visible weight. Nothing is hidden in a black box.'],
      ['Use the safe limit', 'Luxora recommends a limit it considers safe and names the weakest factor — so a partner asking for more gets a defensible counter-offer.'],
      ['Apply or review later', 'Accept the limit, or schedule a re-score once fresher payment data arrives.']
    ],
    note: 'Scoring runs on a transparent weighted model over simulated partner data. It is decision support, not credit advice.'
  },
  'operations-agent': {
    name: 'Operations Agent',
    tag: 'Operations',
    shot: 'operations-agent.png',
    intro: 'Most reorder tools answer one question: do we have enough stock? This one answers two — enough stock <b>and</b> enough cash. The agent watches inventory, drafts the purchase order, then runs it through the 13-week forecast before anyone signs it.',
    steps: [
      ['Let it watch', 'The agent monitors every SKU against its reorder threshold, tracking demand trend and days of cover left.'],
      ['It drafts the order', 'When a SKU drops below threshold, the agent proposes a purchase order — quantity, supplier and expected arrival.'],
      ['It checks the cash', 'The draft PO is pushed through the cash forecast. You see three lines: current, if ordered in full, and after balancing.'],
      ['It flags conflicts', 'If ordering in full would drive the cash trough negative, the agent says so and names the week it breaks.'],
      ['It offers a way out', 'Split the order, or switch to a supplier with longer terms — each option shown with the cash trough it produces, so you approve with the trade-off in front of you.']
    ]
  }
};

const MODULE_ORDER = Object.keys(MODULES);

function renderModulePage(key){
  const host = document.getElementById('page-module');
  const m = MODULES[key];
  if(!host || !m) return;
  const base = (host.getAttribute('data-img-base')||'').replace(/\/$/,'');

  const steps = m.steps.map((s,i)=>{
    const n = (i+1<10?'0':'')+(i+1);
    return '<li class="reveal"><span class="mod-n">'+n+'</span><div><b>'+s[0]+'</b><p>'+s[1]+'</p></div></li>';
  }).join('');

  const at = MODULE_ORDER.indexOf(key);
  const prev = MODULE_ORDER[(at-1+MODULE_ORDER.length)%MODULE_ORDER.length];
  const next = MODULE_ORDER[(at+1)%MODULE_ORDER.length];

  host.innerHTML =
    '<section class="mod-hero"><div class="wrap">'+
      '<a class="mod-back" href="#listings" data-link><span class="arr">&larr;</span> All modules</a>'+
      '<span class="kicker">Module &middot; '+m.tag+'</span>'+
      '<h1 class="mod-title">'+m.name+'</h1>'+
      '<p class="lede mod-intro">'+m.intro+'</p>'+
    '</div></section>'+
    '<section class="mod-main"><div class="wrap">'+
      '<div class="mod-shot reveal"><img src="'+base+'/'+m.shot+'" alt="'+m.name+' in Luxora"></div>'+
      '<div class="mod-body">'+
        '<h2 class="mod-h">How to use it</h2>'+
        '<ol class="mod-steps">'+steps+'</ol>'+
        (m.note ? '<p class="mod-note reveal">'+m.note+'</p>' : '')+
        '<div class="mod-cta reveal">'+
          '<a class="btn btn-primary" href="https://fp-a-app.vercel.app/" target="_blank" rel="noopener">Open the app <span class="arr">&rarr;</span></a>'+
          '<a class="btn btn-ghost" href="#contact" data-link>Talk to us</a>'+
        '</div>'+
      '</div>'+
      '<nav class="mod-nav">'+
        '<a href="#module-'+prev+'" data-link><span class="mod-nav-k">Previous</span><span class="mod-nav-v">'+MODULES[prev].name+'</span></a>'+
        '<a href="#module-'+next+'" data-link class="is-next"><span class="mod-nav-k">Next</span><span class="mod-nav-v">'+MODULES[next].name+'</span></a>'+
      '</nav>'+
    '</div></section>';
}

/* ============ INIT ============ */
document.getElementById('year').textContent=new Date().getFullYear();
routeFromHash();
