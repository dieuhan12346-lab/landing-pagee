<?php get_header(); ?>
<!-- ======================= HOME ======================= -->
<main id="page-home" class="page">
  <!-- HERO -->
  <section class="hero">
    <div class="wrap hero-grid">
      <div>
        <span class="kicker reveal">FP&A · Operating Automation</span>
        <h1 class="reveal">Put your FP&A and operations on <em>autopilot.</em></h1>
        <p class="lede reveal">Luxora unifies budgeting, forecasting, and financial modeling into one automated workspace — so finance teams at SMEs and global enterprises spend less time wrangling spreadsheets and more time driving strategy.</p>
        <div class="hero-cta reveal">
          <a href="https://fp-a-app.vercel.app/" class="btn btn-primary" target="_blank" rel="noopener">Open the app <span class="arr">→</span></a>
          <a href="#listings" class="btn btn-ghost" data-link>See it in action</a>
        </div>
      </div>
      <div class="dash reveal" aria-hidden="true">
        <div class="dash-top">
          <span class="t">13-Week Cash Flow</span>
          <span class="dash-dots"><i></i><i></i><i></i></span>
        </div>
        <div class="dash-stats">
          <div class="dstat"><div class="lab">Forecast horizon</div><div class="num up" data-count="13" data-suffix=" wks">0</div></div>
          <div class="dstat"><div class="lab">Scenarios</div><div class="num mint" data-count="1400" data-suffix="">0</div></div>
        </div>
        <div class="chart">
          <div class="bar" style="height:38%;animation-delay:.05s"></div>
          <div class="bar" style="height:55%;animation-delay:.1s"></div>
          <div class="bar" style="height:46%;animation-delay:.15s"></div>
          <div class="bar" style="height:70%;animation-delay:.2s"></div>
          <div class="bar" style="height:62%;animation-delay:.25s"></div>
          <div class="bar" style="height:88%;animation-delay:.3s"></div>
          <div class="bar" style="height:100%;animation-delay:.35s"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- TICKER — file formats and accounting standards only. No company names: naming a
       vendor in a scrolling strip reads as a partnership, and there is no partnership. -->
  <div class="ticker" aria-label="File formats and accounting standards Luxora works with">
    <div class="ticker-track">
      <span class="ticker-item"><b>Excel · CSV</b></span>
      <span class="ticker-item"><b>VAS · Circular 200</b></span>
      <span class="ticker-item"><b>IFRS</b></span>
      <span class="ticker-item"><b>US GAAP</b></span>
      <span class="ticker-item"><b>13-week forecast</b></span>
      <span class="ticker-item"><b>Monte Carlo</b></span>
      <span class="ticker-item"><b>Excel · CSV</b></span>
      <span class="ticker-item"><b>VAS · Circular 200</b></span>
      <span class="ticker-item"><b>IFRS</b></span>
      <span class="ticker-item"><b>US GAAP</b></span>
      <span class="ticker-item"><b>13-week forecast</b></span>
      <span class="ticker-item"><b>Monte Carlo</b></span>
    </div>
  </div>

  <!-- 3 KEY BENEFITS -->
  <section class="section-pad">
    <div class="wrap">
      <div class="sec-head reveal">
        <span class="kicker">Why Luxora</span>
        <h2>Know your cash before it becomes a problem.</h2>
        <p class="lede">Three shifts that move finance from recording the past to steering what happens next.</p>
      </div>
      <div class="benefits">
        <article class="benefit reveal">
          <div class="ic">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C6F24A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
          </div>
          <span class="idx">01</span>
          <h3>Forecast with odds</h3>
          <p>Not one hopeful line — 1,400 simulations give every week a confidence band and a real probability of running cash-negative.</p>
        </article>
        <article class="benefit reveal">
          <div class="ic">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C6F24A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4M18 12h4M4.9 19.1l2.8-2.8M16.3 7.7l2.8-2.8"/></svg>
          </div>
          <span class="idx">02</span>
          <h3>Bookkeeping that reads itself</h3>
          <p>Upload the invoice list you already export. Columns are matched, entries posted under VAS or IFRS, and every line checked for errors before it reaches your books.</p>
        </article>
        <article class="benefit reveal">
          <div class="ic">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C6F24A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7c.6.5 1 1.3 1 2.3h6c0-1 .4-1.8 1-2.3A7 7 0 0 0 12 2Z"/></svg>
          </div>
          <span class="idx">03</span>
          <h3>Told what to do next</h3>
          <p>Stress-test a downturn in one click, and get the shortlist of exactly which customers to chase to pull deficit risk back to safe.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- SERVICES PREVIEW -->
  <section class="section-pad paper">
    <div class="wrap">
      <div class="sec-head reveal">
        <span class="kicker dark">What we do</span>
        <h2>One platform for the full FP&A and automation stack.</h2>
      </div>
      <div class="svc-grid reveal">
        <article class="svc">
          <span class="tag">01 — Cash Flow</span>
          <h3>Cash Flow Forecast</h3>
          <p>A 13-week forecast from a 1,400-scenario Monte Carlo simulation, with early warning on the probability of a cash deficit each week.</p>
          <a href="#services" class="more" data-link>Explore service →</a>
        </article>
        <article class="svc">
          <span class="tag">02 — Bookkeeping</span>
          <h3>Invoice Reader</h3>
          <p>Upload an Excel invoice list and get automatic journal entries under VAS (Circular 200) or IFRS, with anomaly checks on every line.</p>
          <a href="#services" class="more" data-link>Explore service →</a>
        </article>
        <article class="svc">
          <span class="tag">03 — Planning</span>
          <h3>FP&amp;A Automation</h3>
          <p>ML-based forecasting, automatic Best / Base / Stress scenarios, and early detection of abnormal costs or liquidity gaps.</p>
          <a href="#services" class="more" data-link>Explore service →</a>
        </article>
        <article class="svc">
          <span class="tag">04 — Collections</span>
          <h3>Auto Collections</h3>
          <p>Drafts dunning messages by overdue tier across Email, Zalo and SMS — and an optimal plan of exactly which customers to chase.</p>
          <a href="#services" class="more" data-link>Explore service →</a>
        </article>
      </div>
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section class="section-pad">
    <div class="wrap">
      <div class="sec-head reveal">
        <span class="kicker">How it works</span>
        <h2>Methods you can check, not black boxes.</h2>
      </div>
      <div class="quotes">
        <figure class="quote reveal">
          <blockquote><p>Cash flow is simulated 1,400 times per run — every week gets a P10–P90 confidence band and a real probability of going cash-negative, not a single optimistic line.</p></blockquote>
          <figcaption class="who"><span class="av">MC</span><span><span class="nm">Monte Carlo simulation</span><br><span class="rl">13-week forecast engine</span></span></figcaption>
        </figure>
        <figure class="quote reveal">
          <blockquote><p>Every invoice is posted under the standard your company actually uses — Circular 200 for Vietnamese entities, IFRS 15 for international ones — with balanced entries and line-level checks.</p></blockquote>
          <figcaption class="who"><span class="av">VI</span><span><span class="nm">VAS &amp; IFRS, side by side</span><br><span class="rl">Dual accounting standard</span></span></figcaption>
        </figure>
        <figure class="quote reveal">
          <blockquote><p>Each company is its own set of books, stored in the cloud under your account. Data you enter while trialling is kept in full when you upgrade — nothing to re-enter.</p></blockquote>
          <figcaption class="who"><span class="av">DB</span><span><span class="nm">Your data stays yours</span><br><span class="rl">One company, one ledger</span></span></figcaption>
        </figure>
      </div>
    </div>
  </section>

  <!-- ABOUT PREVIEW -->
  <section class="section-pad paper">
    <div class="wrap split">
      <div class="media reveal">
        <span class="fallback">Finance Team</span>
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/about-story.png" alt="Two people reviewing forecasts on laptops beside a notebook of hand-drawn charts" loading="lazy" onerror="this.style.display='none'">
      </div>
      <div class="reveal">
        <span class="kicker dark">About Luxora</span>
        <h2 style="font-size:clamp(28px,4vw,46px);margin:16px 0 18px">Forecasting power without the platform price.</h2>
        <p class="lede">Accounting software records the past well. Enterprise planning platforms can forecast the future — at tens of thousands a year, plus consultants to configure them. Luxora is built for the gap in between.</p>
        <ul class="feature-list">
          <li><span class="ck">✓</span> Reads the Excel your accounting software already exports — no new template to fill in</li>
          <li><span class="ck">✓</span> Posts under VAS (Circular 200), IFRS or US GAAP — your books, your standard</li>
          <li><span class="ck">✓</span> Self-serve: create a profile, upload one invoice list, read the forecast in minutes</li>
        </ul>
        <a href="#about" class="btn btn-dark mt-cta" data-link style="margin-top:30px">Read our story <span class="arr">→</span></a>
      </div>
    </div>
  </section>

  <!-- FINAL CTA -->
  <section class="section-pad">
    <div class="wrap">
      <div class="cta-band reveal">
        <h2>Ready to put finance on autopilot?</h2>
        <p>Create a company profile and upload one invoice list — you'll read your 13-week forecast in minutes. No call needed to start.</p>
        <div class="band-cta">
          <a href="https://fp-a-app.vercel.app/" class="btn btn-dark" target="_blank" rel="noopener">Open the app <span class="arr">→</span></a>
          <a href="#contact" class="btn btn-band-ghost" data-link>Talk to us</a>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- ======================= ABOUT ======================= -->
<main id="page-about" class="page">
  <section class="section-pad">
    <div class="wrap">
      <span class="kicker reveal">About Luxora</span>
      <h1 class="reveal" style="font-size:clamp(36px,6vw,72px);max-width:18ch;margin:20px 0 26px">We build the operating system for modern finance teams.</h1>
      <p class="lede reveal">Luxora exists to free finance from manual work — turning budgeting, forecasting, and operating processes into automated, trustworthy systems.</p>
    </div>
  </section>

  <section class="section-pad paper" style="padding-top:0">
    <div class="wrap">
      <div class="story reveal">
        <span class="kicker dark">Our story</span>
        <h2>Between "bookkeeping" and "too expensive".</h2>
        <p>Accounting software is very good at recording the past. But it doesn't answer the question that actually keeps an owner awake: <em>will I have enough cash next month?</em></p>
        <p>At the other end, enterprise FP&amp;A platforms can answer it — for tens of thousands of dollars a year and a team of consultants to configure them. Far out of reach for a small or mid-sized business.</p>
        <p class="story-end">Luxora is built for the gap in between: forecasting and scenario power close to the big platforms, packaged so it works out of the box, priced for SMEs, and localized to Circular 200 — with IFRS for companies operating abroad.</p>
      </div>
    </div>
  </section>

  <!-- MISSION -->
  <section class="section-pad">
    <div class="wrap">
      <div class="vm-grid">
        <div class="vm reveal">
          <span class="kicker">Vision</span>
          <h2>A ten-person company should read its future as clearly as a ten-thousand-person one.</h2>
          <p>Forecasting stopped being a technical problem years ago. It stayed an expensive one — and that is what keeps it out of reach of the businesses that need it most.</p>
        </div>
        <div class="vm reveal">
          <span class="kicker">Mission</span>
          <h2>Put forecasting and scenario power within reach of any business that keeps its own books.</h2>
          <p>No consultants, no rollout, no new template to fill in. Upload the invoice list your accounting software already exports, and read the next thirteen weeks.</p>
        </div>
      </div>

      <!-- Six modules, one platform — inline SVG so it uses the theme tokens and stays crisp at any size -->
      <figure class="orbit reveal">
        <svg viewBox="0 0 900 680" role="img" aria-labelledby="orbitTitle orbitDesc">
          <title id="orbitTitle">The six Luxora modules around one platform</title>
          <desc id="orbitDesc">Cash Flow, Invoice Reader, FP&amp;A Automation, Auto Collections, Credit Scoring and Operations Agent all run on the same company profile and the same set of books.</desc>

          <!-- orbit ring + spokes -->
          <circle class="o-ring" cx="450" cy="340" r="235"/>
          <g class="o-spoke">
            <line x1="450" y1="340" x2="450" y2="105"/><line x1="450" y1="340" x2="654" y2="223"/>
            <line x1="450" y1="340" x2="654" y2="458"/><line x1="450" y1="340" x2="450" y2="575"/>
            <line x1="450" y1="340" x2="246" y2="458"/><line x1="450" y1="340" x2="246" y2="223"/>
          </g>

          <!-- module nodes -->
          <g class="o-node">
            <g><circle cx="450" cy="105" r="74"/><text class="o-n" x="450" y="84">01</text><text class="o-l" x="450" y="108">Cash</text><text class="o-l" x="450" y="127">Flow</text></g>
            <g><circle cx="654" cy="223" r="74"/><text class="o-n" x="654" y="202">02</text><text class="o-l" x="654" y="226">Invoice</text><text class="o-l" x="654" y="245">Reader</text></g>
            <g><circle cx="654" cy="458" r="74"/><text class="o-n" x="654" y="437">03</text><text class="o-l" x="654" y="461">FP&amp;A</text><text class="o-l" x="654" y="480">Automation</text></g>
            <g><circle cx="450" cy="575" r="74"/><text class="o-n" x="450" y="554">04</text><text class="o-l" x="450" y="578">Auto</text><text class="o-l" x="450" y="597">Collections</text></g>
            <g><circle cx="246" cy="458" r="74"/><text class="o-n" x="246" y="437">05</text><text class="o-l" x="246" y="461">Credit</text><text class="o-l" x="246" y="480">Scoring</text></g>
            <g><circle cx="246" cy="223" r="74"/><text class="o-n" x="246" y="202">06</text><text class="o-l" x="246" y="226">Operations</text><text class="o-l" x="246" y="245">Agent</text></g>
          </g>

          <!-- core -->
          <circle class="o-halo" cx="450" cy="340" r="104"/>
          <circle class="o-core" cx="450" cy="340" r="86"/>
          <text class="o-core-t" x="450" y="352">Luxora</text>
        </svg>
      </figure>

      <div class="stats-band reveal">
        <div class="stat"><div class="big" data-count="13" data-suffix="">0</div><div class="lab">Weeks of cash visibility</div></div>
        <div class="stat"><div class="big" data-count="1400" data-suffix="">0</div><div class="lab">Scenarios per forecast</div></div>
        <div class="stat"><div class="big" data-count="6" data-suffix="">0</div><div class="lab">Modules, one platform</div></div>
        <div class="stat"><div class="big" data-count="3" data-suffix="">0</div><div class="lab">Standards: VAS, IFRS &amp; US GAAP</div></div>
      </div>
    </div>
  </section>

  <!-- CORE VALUES -->
  <section class="section-pad" style="padding-top:0">
    <div class="wrap">
      <div class="sec-head reveal">
        <span class="kicker">Core values</span>
        <h2>How we decide what to build.</h2>
      </div>
      <div class="values">
        <article class="value reveal">
          <span class="v-n">01</span>
          <h3>Show the work</h3>
          <p>Every number points back to where it came from. The credit model shows each sub-score and the weight it carried; the invoice reader shows the arithmetic behind every flag it raises. If we can't show why, we don't show the number.</p>
        </article>
        <article class="value reveal">
          <span class="v-n">02</span>
          <h3>Say only what we can prove</h3>
          <p>No metric we haven't measured. No integration we haven't built. When a company has no data yet, the screen says so — it doesn't borrow a sample and present it as yours.</p>
        </article>
        <article class="value reveal">
          <span class="v-n">03</span>
          <h3>A local book is not a lesser book</h3>
          <p>Circular 200 gets its own chart of accounts and its own tax checks — not a translation layer bolted onto IFRS. Where you file and how you report are two different questions, and we keep them apart.</p>
        </article>
        <article class="value reveal">
          <span class="v-n">04</span>
          <h3>If it needs a rollout, it isn't finished</h3>
          <p>Anything that would take a consultant to explain is something we haven't built properly yet. The fix belongs in the product, not in an onboarding call.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- WHAT MAKES US DIFFERENT -->
  <section class="section-pad paper">
    <div class="wrap">
      <div class="sec-head reveal">
        <span class="kicker dark">What makes us different</span>
        <h2>We're not another dashboard tool.</h2>
      </div>
      <div class="benefits">
        <article class="benefit reveal" style="background:rgba(12,18,14,.03);border-color:rgba(12,18,14,.1)">
          <span class="idx" style="color:var(--signal-deep)">A</span>
          <h3 style="color:var(--ink-on-paper)">Local rules, built in</h3>
          <p style="color:var(--paper-dim)">Journal entries follow Circular 200 for Vietnamese entities and IFRS 15 for international ones — not a generic chart of accounts bolted on afterwards.</p>
        </article>
        <article class="benefit reveal" style="background:rgba(12,18,14,.03);border-color:rgba(12,18,14,.1)">
          <span class="idx" style="color:var(--signal-deep)">B</span>
          <h3 style="color:var(--ink-on-paper)">Forecast, not just dashboards</h3>
          <p style="color:var(--paper-dim)">Most tools show you what already happened. Luxora simulates what happens next — and tells you which customers to chase to avoid running dry.</p>
        </article>
        <article class="benefit reveal" style="background:rgba(12,18,14,.03);border-color:rgba(12,18,14,.1)">
          <span class="idx" style="color:var(--signal-deep)">C</span>
          <h3 style="color:var(--ink-on-paper)">Minutes, not a rollout</h3>
          <p style="color:var(--paper-dim)">No consultants, no 12-month implementation. Sign in, create a company profile, upload an invoice list — you see entries and a forecast in the same session.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section-pad">
    <div class="wrap">
      <div class="cta-band reveal">
        <h2>See where your cash lands in 13 weeks.</h2>
        <p>Create a company profile, upload your invoices, and read the forecast — free to start, and your data carries over if you upgrade.</p>
        <a href="https://fp-a-app.vercel.app/" class="btn btn-dark" target="_blank" rel="noopener">Open the app <span class="arr">→</span></a>
      </div>
    </div>
  </section>
</main>

<!-- ======================= SERVICES ======================= -->
<main id="page-services" class="page">
  <section class="section-pad">
    <div class="wrap">
      <span class="kicker reveal">Services</span>
      <h1 class="reveal" style="font-size:clamp(36px,6vw,72px);max-width:16ch;margin:20px 0 26px">FP&amp;A and operating automation, end to end.</h1>
      <p class="lede reveal">From planning to close to board reporting — every layer of your finance function, automated and connected.</p>
    </div>
  </section>

  <!-- SERVICE GRID -->
  <section style="padding-bottom:clamp(64px,9vw,118px)">
    <div class="wrap">
      <div class="svc-grid reveal">
        <article class="svc">
          <span class="tag">Module 01</span>
          <h3>Cash Flow</h3>
          <p>A 13-week forecast from a 1,400-scenario Monte Carlo simulation with a P10–P90 band, early warning on cash-deficit risk each week, stress-test scenarios and an optimal collection plan.</p>
        </article>
        <article class="svc">
          <span class="tag">Module 02</span>
          <h3>Invoice Reader</h3>
          <p>Upload an Excel/CSV invoice list — auto-detected columns, automatic journal entries under VAS (Circular 200) or IFRS, anomaly checks, and upload history per company. Credit-sale invoices flow straight into cash flow.</p>
        </article>
        <article class="svc">
          <span class="tag">Module 03</span>
          <h3>FP&amp;A Automation</h3>
          <p>ML-based forecasting that blends macro signals, automatic Best / Base / Stress scenarios, and early detection of abnormal costs and liquidity gaps 30–60 days ahead.</p>
        </article>
        <article class="svc">
          <span class="tag">Module 04</span>
          <h3>Auto Collections</h3>
          <p>Drafts dunning messages by overdue tier — gentle to urgent — across Email, Zalo and SMS, in Vietnamese or English depending on the company profile.</p>
        </article>
        <article class="svc">
          <span class="tag">Module 05</span>
          <h3>Credit Scoring</h3>
          <p>Rates B2B partners on payment history and size, suggests safe credit limits per customer, and warns when one partner holds too much of your receivables.</p>
        </article>
        <article class="svc">
          <span class="tag">Module 06</span>
          <h3>Operations Agent</h3>
          <p>Tracks inventory and suggests reorder points, proposes purchase orders balanced against cash flow, and optimizes delivery routes to cut operating cost.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- HOW IT WORKS -->
  <section class="section-pad paper">
    <div class="wrap">
      <div class="sec-head reveal">
        <span class="kicker dark">How it works</span>
        <h2>From sign-in to forecast in one session.</h2>
      </div>
      <div class="steps reveal">
        <div class="step">
          <div class="n">01</div>
          <h3>Create a company</h3>
          <p>Sign in and set your country, currency, timezone and accounting standard — VAS or IFRS. Everything downstream follows that profile.</p>
        </div>
        <div class="step">
          <div class="n">02</div>
          <h3>Upload invoices</h3>
          <p>Drop in the Excel or CSV invoice list your accounting software already exports. Columns are detected automatically and posted as journal entries.</p>
        </div>
        <div class="step">
          <div class="n">03</div>
          <h3>Add cash data</h3>
          <p>Enter your opening balance, receivables and payables. Credit-sale invoices become receivables on their own — no double entry.</p>
        </div>
        <div class="step">
          <div class="n">04</div>
          <h3>Act on it</h3>
          <p>Read the 13-week forecast, run stress-test scenarios, take the suggested collection plan, and export to Excel or PDF.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section-pad">
    <div class="wrap">
      <div class="sec-head reveal center tac" style="text-align:center;margin-bottom:44px">
        <span class="kicker" style="justify-content:center">FAQ</span>
        <h2 style="margin-top:16px">Questions, answered.</h2>
      </div>
      <div class="faq reveal">
        <div class="faq-item">
          <button class="faq-q">Do we have to replace our accounting software?<span class="pm">+</span></button>
          <div class="faq-a"><p>No. Luxora sits on top of what you already use. Keep doing your books wherever you do them today — you simply upload the invoice list your accounting software already exports, and Luxora handles the posting and the forecast.</p></div>
        </div>
        <div class="faq-item">
          <button class="faq-q">How long does setup take?<span class="pm">+</span></button>
          <div class="faq-a"><p>There is no implementation project. Luxora runs in the browser — sign in, create a company profile, upload your first invoice list, and you have journal entries and a 13-week forecast in the same session.</p></div>
        </div>
        <div class="faq-item">
          <button class="faq-q">Is this for small businesses or international companies?<span class="pm">+</span></button>
          <div class="faq-a"><p>Both. Vietnamese companies post under Circular 200 in Vietnamese; companies set to another country run on IFRS with an English interface. Each company is its own set of books, so an accounting firm can manage several and switch between them in one click.</p></div>
        </div>
        <div class="faq-item">
          <button class="faq-q">Where is my data, and what happens if I stop?<span class="pm">+</span></button>
          <div class="faq-a"><p>Your data is stored in the cloud under your own account, and every query is scoped so an account can only ever read its own rows. Data you enter while trialling is kept in full when you upgrade — nothing to re-enter. We do not hold a SOC 2 certification today; if formal certification is a requirement for you, tell us and we'll be straight about where we are.</p></div>
        </div>
        <div class="faq-item">
          <button class="faq-q">What does pricing look like?<span class="pm">+</span></button>
          <div class="faq-a"><p>Start free and keep your data. Paid plans begin around 1.5–3M VND per month depending on company size, with additional AI agents at about 1M VND each per month. Larger setups — several companies, on-site training — are quoted individually.</p></div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-pad" style="padding-top:0">
    <div class="wrap">
      <div class="cta-band reveal">
        <h2>Try it on your own numbers.</h2>
        <p>Open the app and upload one invoice list — that is usually enough to see whether Luxora fits. Questions? Talk to us instead.</p>
        <div class="band-cta">
          <a href="https://fp-a-app.vercel.app/" class="btn btn-dark" target="_blank" rel="noopener">Open the app <span class="arr">→</span></a>
          <a href="#contact" class="btn btn-band-ghost" data-link>Talk to us</a>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- ======================= LISTINGS ======================= -->
<main id="page-listings" class="page">
  <section class="section-pad" style="padding-bottom:clamp(40px,6vw,60px)">
    <div class="wrap">
      <span class="kicker reveal">Modules</span>
      <h1 class="reveal" style="font-size:clamp(36px,6vw,72px);max-width:16ch;margin:20px 0 26px">Every module, one platform.</h1>
      <p class="lede reveal">The full Luxora stack — from reading invoices to forecasting cash flow. Filter by what your team needs.</p>
    </div>
  </section>

  <section style="padding-bottom:clamp(64px,9vw,118px)">
    <div class="wrap">
      <div class="filter-bar reveal" id="filterBar">
        <button class="active" data-filter="all">All modules</button>
        <button data-filter="fpa">FP&A</button>
        <button data-filter="books">Bookkeeping</button>
        <button data-filter="ops">Operations</button>
      </div>

      <div class="cards" id="cardGrid">
        <!-- 1 -->
        <article class="card reveal" data-cat="fpa">
          <div class="media">
            <span class="fallback">Cash Flow</span>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/modules/cash-flow.png" alt="13-week cash flow forecast dashboard with confidence band" loading="lazy" onerror="this.style.display='none'">
          </div>
          <div class="card-body">
            <span class="cat">Module · FP&A</span>
            <h3>Cash Flow</h3>
            <p>A 13-week forecast from a 1,400-scenario Monte Carlo simulation with early warning on cash-deficit risk, stress-test scenarios and an optimal collection plan.</p>
            <div class="metrics">
              <div><div class="v">13 wks</div><div class="k">Horizon</div></div>
              <div><div class="v">1,400</div><div class="k">Scenarios</div></div>
            </div>
            <a class="clink" href="#module-cash-flow" data-link>Explore module →</a>
          </div>
        </article>
        <!-- 2 -->
        <article class="card reveal" data-cat="books">
          <div class="media">
            <span class="fallback">Invoice Reader</span>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/modules/invoice-reader.png" alt="Excel invoice list turned into automatic journal entries" loading="lazy" onerror="this.style.display='none'">
          </div>
          <div class="card-body">
            <span class="cat">Module · Bookkeeping</span>
            <h3>Invoice Reader</h3>
            <p>Upload an Excel/CSV invoice list — auto-detected columns, automatic journal entries under VAS or IFRS, anomaly checks per line, and history per company.</p>
            <div class="metrics">
              <div><div class="v">VAS+IFRS</div><div class="k">Standards</div></div>
              <div><div class="v">Auto</div><div class="k">Journal entries</div></div>
            </div>
            <a class="clink" href="#module-invoice-reader" data-link>Explore module →</a>
          </div>
        </article>
        <!-- 3 -->
        <article class="card reveal" data-cat="fpa">
          <div class="media">
            <span class="fallback">FP&A Automation</span>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/modules/fpa-automation.png" alt="ML scenario planning and sensitivity analysis" loading="lazy" onerror="this.style.display='none'">
          </div>
          <div class="card-body">
            <span class="cat">Module · FP&A</span>
            <h3>FP&amp;A Automation</h3>
            <p>ML-based forecasting that blends macro signals, automatic Best / Base / Stress scenarios, and early detection of abnormal costs and liquidity gaps.</p>
            <div class="metrics">
              <div><div class="v">30–60d</div><div class="k">Early warning</div></div>
              <div><div class="v">ML</div><div class="k">Forecast</div></div>
            </div>
            <a class="clink" href="#module-fpa-automation" data-link>Explore module →</a>
          </div>
        </article>
        <!-- 4 -->
        <article class="card reveal" data-cat="ops">
          <div class="media">
            <span class="fallback">Auto Collections</span>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/modules/auto-collections.png" alt="Automated dunning messages across channels" loading="lazy" onerror="this.style.display='none'">
          </div>
          <div class="card-body">
            <span class="cat">Module · Operations</span>
            <h3>Auto Collections</h3>
            <p>Drafts dunning messages by overdue tier — gentle to urgent — across Email, Zalo and SMS, in Vietnamese or English by company profile.</p>
            <div class="metrics">
              <div><div class="v">3</div><div class="k">Channels</div></div>
              <div><div class="v">By tier</div><div class="k">Tone</div></div>
            </div>
            <a class="clink" href="#module-auto-collections" data-link>Explore module →</a>
          </div>
        </article>
        <!-- 5 -->
        <article class="card reveal" data-cat="fpa">
          <div class="media">
            <span class="fallback">Credit Scoring</span>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/modules/credit-scoring.png" alt="B2B partner credit rating and safe limit suggestions" loading="lazy" onerror="this.style.display='none'">
          </div>
          <div class="card-body">
            <span class="cat">Module · FP&A</span>
            <h3>Credit Scoring</h3>
            <p>Rates B2B partners on payment history and size, suggests safe credit limits per customer, and warns when one partner holds too much of your receivables.</p>
            <div class="metrics">
              <div><div class="v">B2B</div><div class="k">Partner rating</div></div>
              <div><div class="v">Safe</div><div class="k">Credit limits</div></div>
            </div>
            <a class="clink" href="#module-credit-scoring" data-link>Explore module →</a>
          </div>
        </article>
        <!-- 6 -->
        <article class="card reveal" data-cat="ops">
          <div class="media">
            <span class="fallback">Operations Agent</span>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/modules/operations-agent.png" alt="Inventory, reorder and delivery route optimization" loading="lazy" onerror="this.style.display='none'">
          </div>
          <div class="card-body">
            <span class="cat">Module · Operations</span>
            <h3>Operations Agent</h3>
            <p>Tracks inventory and suggests reorder points, proposes purchase orders balanced against cash flow, and optimizes delivery routes to cut operating cost.</p>
            <div class="metrics">
              <div><div class="v">Inventory</div><div class="k">Reorder</div></div>
              <div><div class="v">Routes</div><div class="k">Optimized</div></div>
            </div>
            <a class="clink" href="#module-operations-agent" data-link>Explore module →</a>
          </div>
        </article>
      </div>

      <div class="cta-band reveal" style="margin-top:60px">
        <h2>See it on your own numbers</h2>
        <p>Open the app, create a company profile and upload your first invoice — your data is kept when you upgrade. Or send us a question.</p>
        <div class="band-cta">
          <a href="https://fp-a-app.vercel.app/" class="btn btn-dark" target="_blank" rel="noopener">Open the app <span class="arr">→</span></a>
          <a href="#contact" class="btn btn-band-ghost" data-link>Talk to us</a>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- ======================= CONTACT ======================= -->
<main id="page-contact" class="page">
  <section class="section-pad">
    <div class="wrap">
      <span class="kicker reveal">Contact</span>
      <h1 class="reveal" style="font-size:clamp(38px,7vw,76px);margin:20px 0 26px">Let's talk.</h1>
      <p class="lede reveal">Ask a question, or tell us about the workflow that's eating your team's week. We reply within one business day.</p>
    </div>
  </section>

  <section style="padding-bottom:clamp(64px,9vw,118px)">
    <div class="wrap contact-grid">
      <!-- FORM -->
      <div class="form-card reveal">
        <div class="form-success" id="formSuccess">✓ Thanks — your message is on its way. We'll be in touch within one business day.</div>
        <form id="contactForm" novalidate>
          <div class="field" id="f-name">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Jane Anderson" autocomplete="name">
            <span class="msg">Please enter your name.</span>
          </div>
          <div class="field" id="f-email">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="jane@company.com" autocomplete="email">
            <span class="msg">Please enter a valid email address.</span>
          </div>
          <div class="field" id="f-phone">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" placeholder="+1 (555) 000-0000" autocomplete="tel">
            <span class="msg">Please enter your phone number.</span>
          </div>
          <div class="field" id="f-message">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Tell us about your finance workflows…"></textarea>
            <span class="msg">Please add a short message.</span>
          </div>
          <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center">Send message <span class="arr">→</span></button>
        </form>
      </div>

      <!-- INFO -->
      <div class="reveal">
        <div class="info-row">
          <span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg></span>
          <div><div class="k">Email</div><div class="v"><a href="mailto:luxora@luxorasystem.com" style="color:inherit">luxora@luxorasystem.com</a></div></div>
        </div>
        <div class="info-row">
          <span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.6A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2Z"/></svg></span>
          <div><div class="k">Try it now</div><div class="v"><a href="https://fp-a-app.vercel.app/" target="_blank" rel="noopener" style="color:inherit">Open the app — no install needed</a></div></div>
        </div>
        <div class="info-row">
          <span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg></span>
          <div><div class="k">Based in</div><div class="v">Vietnam · Serving SMEs and<br>international companies</div></div>
        </div>
        <div class="info-row" style="border-bottom:none">
          <span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></span>
          <div><div class="k">Hours</div><div class="v">Mon–Fri · 9:00–18:00 (GMT+7)</div></div>
        </div>

        <div class="socials">
          <a href="#" aria-label="LinkedIn" title="LinkedIn"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14zM8.3 18V10H5.7v8h2.6zM7 8.8a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM18.3 18v-4.4c0-2.3-1.2-3.4-2.9-3.4-1.3 0-1.9.7-2.2 1.2V10h-2.6v8h2.6v-4.3c0-.2 0-.5.1-.6.2-.5.6-1 1.4-1 .9 0 1.3.7 1.3 1.8V18h2.6z"/></svg></a>
          <a href="#" aria-label="X / Twitter" title="X"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.2 2H21l-6.5 7.4L22 22h-6.3l-5-6.5L5 22H2.2l7-8L2 2h6.4l4.5 6 5.3-6zm-2.2 18h1.7L8 3.8H6.2L16 20z"/></svg></a>
          <a href="#" aria-label="YouTube" title="YouTube"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23 12s0-3.2-.4-4.7a2.5 2.5 0 0 0-1.7-1.8C19.4 5 12 5 12 5s-7.4 0-9 .5A2.5 2.5 0 0 0 1.4 7.3C1 8.8 1 12 1 12s0 3.2.4 4.7a2.5 2.5 0 0 0 1.7 1.8c1.6.5 9 .5 9 .5s7.4 0 9-.5a2.5 2.5 0 0 0 1.7-1.8C23 15.2 23 12 23 12zM9.8 15.3V8.7l5.7 3.3-5.7 3.3z"/></svg></a>
          <a href="#" aria-label="GitHub" title="GitHub"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-3.2 19.5c.5.1.7-.2.7-.5v-1.7c-2.8.6-3.4-1.3-3.4-1.3-.5-1.2-1.1-1.5-1.1-1.5-.9-.6.1-.6.1-.6 1 .1 1.5 1 1.5 1 .9 1.5 2.3 1.1 2.9.8 0-.6.3-1.1.6-1.4-2.2-.2-4.6-1.1-4.6-5 0-1.1.4-2 1-2.7-.1-.3-.4-1.3.1-2.6 0 0 .8-.3 2.7 1a9.4 9.4 0 0 1 5 0c1.9-1.3 2.7-1 2.7-1 .5 1.3.2 2.3.1 2.6.6.7 1 1.6 1 2.7 0 3.9-2.4 4.8-4.6 5 .3.3.6.9.6 1.8v2.7c0 .3.2.6.7.5A10 10 0 0 0 12 2z"/></svg></a>
        </div>

        <div class="map-wrap">
          <iframe title="Luxora office location map" loading="lazy" src="https://www.google.com/maps?q=Market+Street,+San+Francisco,+CA&output=embed"></iframe>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- ======================= MODULE DETAIL PAGE ======================= -->
<main id="page-module" class="page"
      data-img-base="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/modules"></main>

<?php get_footer(); ?>
