# LGBT IRL Connection Platform — Initial Product Plan

## 1) Product Strategy at a Glance

### Positioning
- **Community-first, SFW-only, IRL-first** platform for LGBTQ+ friendship and belonging.
- Explicitly **not a dating/hookup product** in MVP.
- Core differentiator: **healthy culture via built-in governance + moderation + real-world participation loops**.

### Website vs App (recommended answer to your key question)
- Keep and upgrade the **website** as a public growth + trust layer.
- Use **web + mobile app** as the logged-in product for community, events, experiences, and operations.

**Recommended split:**
- **Public website:** brand story, local chapters, browse experiences, scholarship info, host intake, trip/chapter request forms, app download links.
- **Logged-in app (mobile + web):** join communities, subgroup chat, RSVP/booking/payments, moderation flows, host tools, credits.

This avoids replacing the website entirely while making the app the center of ongoing participation.

---

## 2) Experience Architecture (Website + App)

## 2.1 Public Website (Phase 1)
Primary goals: discoverability, credibility, conversion to app signup/booking.

Core pages:
1. **Home** (what this is, values, SFW stance, app CTA).
2. **Experiences** (search/listings by location, date, category/community tags).
3. **Local Chapters** (city pages + “Join in App” CTA).
4. **Host an Experience** (intake form similar to creator onboarding).
5. **Request a Trip / Request a Chapter** (demand intake, waitlist by city).
6. **Scholarships** (program explainer + application funnel).
7. **About + Community Guidelines + Safety**.
8. **Download App** (iOS/Android links + QR).

## 2.2 Logged-in App (MVP)
- Onboarding (city, interests, social intent)
- Communities + subgroup channels
- Events + experiences browsing/search
- Booking and checkout (Stripe)
- Scholarship credits at checkout
- Event/experience threads
- Reporting/moderation actions
- Admin + regional operations tools

---

## 3) MVP Scope (90-Day Build Target)

## 3.1 Must-Have MVP Features
1. **Identity and onboarding**
   - Email/social auth, profile basics, city selection, interests, social intent.
2. **Community structure**
   - City/region communities with subgroup channels.
   - Subgroup creation request + approval workflow.
3. **Experiences marketplace**
   - Listing creation, schedule/capacity, pricing, booking, payment, refunds.
   - Filters: location, dates, interest/community tags.
4. **Events coordination**
   - RSVP, waitlist, attendance check, event thread.
5. **Moderation and governance**
   - Roles (Admin, Regional Monitor, City Lead/Co-Lead, Host, Member).
   - Report flow + moderation queue + action logging.
6. **Scholarships and credits**
   - Application form, review workflow, credit issuance.
   - Credits redeemable at checkout without reducing host payout.
7. **Website CMS-lite**
   - Edit key marketing pages, FAQs, chapter content, scholarship page.

## 3.2 Explicitly Deferred
- Full DM system (beyond event/experience threads)
- Peer-to-peer gear exchange marketplace
- Complex recommendation algorithms
- Advanced influencer/affiliate mechanics

---

## 4) Initial User Stories Tab (starter backlog)

Use these as the first entries in a “User Stories” sheet with columns:
**ID | Persona | Story | Priority | Acceptance Criteria | Notes**

## 4.1 Members
- **US-001 (P0):** As a member, I can set my city + interests during onboarding so I land in relevant communities.
- **US-002 (P0):** As a member, I can browse experiences by location and date so I can find events I can attend.
- **US-003 (P0):** As a member, I can book and pay for an experience in one flow.
- **US-004 (P0):** As a member, I can apply scholarship credits at checkout.
- **US-005 (P1):** As a member, I can request a new subgroup with a purpose description.
- **US-006 (P1):** As a member, I can request a new chapter in my community.
- **US-007 (P1):** As a member, I can report users/events/messages that violate guidelines.

## 4.2 Hosts/Organizers
- **US-101 (P0):** As a host, I can submit a trip proposal/intake form for approval.
- **US-102 (P0):** As a host, I can publish an approved experience listing with dates, capacity, and price.
- **US-103 (P0):** As a host, I can see projected payout and fee breakdown before publishing.
- **US-104 (P1):** As a host, I can view booking roster, waivers, and attendee messages.
- **US-105 (P1):** As a host, I can follow cancellation/refund policy without manual spreadsheets.

## 4.3 Moderation & Ops
- **US-201 (P0):** As a City Lead, I can approve/reject subgroup creation requests.
- **US-202 (P0):** As a moderator, I can warn/mute/remove members and log rationale.
- **US-203 (P0):** As Regional Monitor, I can review escalated incidents across cities.
- **US-204 (P1):** As Admin, I can configure role assignments and city coverage.

## 4.4 Scholarships & Finance
- **US-301 (P0):** As Admin, I can review scholarship applications and approve credit amounts.
- **US-302 (P0):** As Admin, I can define split rules (host/platform/scholarship allocation).
- **US-303 (P0):** As finance admin, I can hold/approve payouts and account for refunds.
- **US-304 (P1):** As a donor, I can sponsor ticket funding and see basic impact transparency.

## 4.5 Website Growth
- **US-401 (P0):** As a visitor, I can discover local chapters and download the app.
- **US-402 (P0):** As a visitor, I can request a trip in my area via website form.
- **US-403 (P0):** As a visitor, I can learn scholarship eligibility and apply.
- **US-404 (P1):** As a visitor, I can browse upcoming trips without creating an account.

---

## 5) System Design Decisions (Early)

1. **One backend, multi-client**
   - Shared APIs for website, iOS, and Android to keep governance/payments consistent.
2. **Policy engine + role-based access control**
   - Centralized authorization for moderation and financial actions.
3. **Payments architecture**
   - Stripe for checkout, refunds, credits application, and payout ledger.
4. **Auditability by default**
   - Every moderation and payout-affecting action writes to immutable logs.
5. **Content safety pipeline**
   - Rule-based and AI-assisted flagging with human-in-the-loop decisions.

---

## 6) Implementation Plan by Milestone

## Milestone 0 (Weeks 1–2): Foundation
- Product requirements baseline + clickable UX flows
- Data model + RBAC matrix
- Design system and page templates
- Legal baseline: ToS, waiver template, refund policy draft

## Milestone 1 (Weeks 3–6): Core Community + Listings
- Auth, onboarding, city and subgroup model
- Experience listing CRUD + search filters
- Host intake + approval pipeline
- Public website skeleton + app download funnel

## Milestone 2 (Weeks 7–10): Booking + Scholarships + Moderation
- Checkout, booking states, refunds basics
- Scholarship application + credit wallet integration
- Reporting queue + moderation actions + audit log
- Role assignment workflows (city lead/co-lead/monitor)

## Milestone 3 (Weeks 11–13): Stabilization + Pilot Launch
- Pilot in 1–2 cities + 20–50 hosts
- Trust & safety playbooks, incident escalation runbooks
- Analytics dashboards (conversion, attendance, incidents, payout timing)
- Launch checklist for app stores and website handoff

---

## 7) KPIs for First 6 Months

### Community Health
- 30-day retained active members by city
- % members attending at least 1 IRL event per month
- Report rate per 100 active users + median resolution time

### Marketplace Health
- Experience publish-to-booking conversion
- Booking completion rate
- Refund/dispute rate
- Host repeat listing rate

### Equity & Access
- Scholarship applications/month
- Approval rate and credit utilization
- % bookings involving scholarship credits

### Sustainability
- Gross merchandise volume (GMV)
- Net platform take (post-refunds)
- Payout cycle reliability and support ticket volume

---

## 8) Top Open Decisions to Finalize This Month

1. **Host verification at launch**
   - Light verification + manual approval vs stronger identity checks.
2. **Refund/cancellation standardization**
   - Single platform policy vs host-defined with limits.
3. **DM scope for MVP**
   - Event/experience threads only vs direct messaging.
4. **Scholarship constraints**
   - City-limited credits, category-limited credits, expiration rules.
5. **Legal/risk posture**
   - Insurance requirements, waiver model, incident response ownership.

---

## 9) Suggested Immediate Next Steps (this week)

1. Approve the **website + app split** architecture.
2. Confirm **MVP boundaries** and defer list.
3. Prioritize first **30 user stories** for sprint planning.
4. Draft moderation policy v1 and escalation SOP.
5. Lock payment/refund/payout policy assumptions for engineering.
