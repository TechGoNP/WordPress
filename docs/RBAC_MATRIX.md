# RBAC Matrix (Prototype Draft)

| Capability | Admin | Regional Monitor | City Lead / Co-Lead | Host | Member |
|---|---:|---:|---:|---:|---:|
| Manage platform policy | ✅ | ❌ | ❌ | ❌ | ❌ |
| Review escalated incidents across cities | ✅ | ✅ | ❌ | ❌ | ❌ |
| Moderate users/events in assigned city | ✅ | ✅ | ✅ | ❌ | ❌ |
| Approve subgroup requests | ✅ | ✅ | ✅ | ❌ | ❌ |
| Submit host intake | ✅ | ✅ | ✅ | ✅ | ✅ |
| Publish experiences | ✅ | ❌ | ✅ | ✅ | ❌ |
| View own booking roster | ✅ | ❌ | ✅ | ✅ | ❌ |
| Book experiences | ✅ | ✅ | ✅ | ✅ | ✅ |
| Apply scholarship credits at checkout | ✅ | ✅ | ✅ | ✅ | ✅ |
| Configure role assignments | ✅ | ❌ | ❌ | ❌ | ❌ |

## Rules
- All moderation and payout-impacting actions must write to `AuditLog`.
- City-scoped roles must be constrained to assigned cities.
- Regional Monitor can override city-level moderation in escalation flows.
