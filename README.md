# Backend Course Project

## Medialab Loan Application

---

**BELANGRIJK**

Eerst volgende commando's runnen:
`php artisan migrate:refresh`
`php artisan db:seed`
`php artisan schedule:work`

### User Stories

-   [x] Overzicht van beschikbare items
-   [x] Onderscheid tussen uitlenen (data zit in database maar wordt niet getoond):
    -   voor school gebruik
    -   voor privé gebruik
    -   op de campus
-   [x] Standaard termijn van 5 dagen
    -   [ ] Mogelijkheid om termijn in de toekomst aan te passen
-   [x] Bij terugkeer mogelijkheid om schade of opmerkingen te noteren
-   [ ] Notificaties via mail aan gebruik over aflopen termijn
-   [x] Mogelijkheid om te kunnen reserveren voor later moment
-   [x] Items moeten volgende statussen kunnen hebben:
    -   Beschikbaar
    -   Uitgeleend
    -   Gereserveerd
    -   In repair
    -   Onbeschikbaar

### Extras

-   [ ] Mogelijkheid tot toewijzen sanctie bij onopgehaalde gereserveerde items

### ERD

### Bronnen

User/Admin system - https://www.youtube.com/watch?v=kZOgH3-0Bko
Scheduler - https://www.youtube.com/watch?v=vZYRDRF4yF4
