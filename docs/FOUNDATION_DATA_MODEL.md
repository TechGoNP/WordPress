# Foundation Data Model (Prototype)

## Core entities

- **UserProfile**: id, email, display_name, city, interests[], social_intent, created_at.
- **Community**: id, city, region, description, status.
- **Subgroup**: id, community_id, name, purpose, approval_status, created_by.
- **Experience**: id, host_id, title, description, city, start_at, end_at, capacity, price_cents, status.
- **Booking**: id, user_id, experience_id, booking_status, amount_cents, credit_applied_cents, created_at.
- **ScholarshipApplication**: id, user_email, city, requested_amount_cents, context, status.
- **ModerationReport**: id, reporter_user_id, target_type, target_id, reason, severity, status.
- **ModerationAction**: id, report_id, action_type, actor_role, rationale, created_at.
- **AuditLog**: id, actor_id, action_type, object_type, object_id, metadata_json, created_at.

## Notes

- Prototype forms currently persist to JSONL files as intake queues.
- This file is the source for later SQL schema creation in Milestone 1.
