# Opdracht junior backend developer

## Case
De website van één van onze opdrachtgevers bevat nieuwsberichten. De opdrachtgever wil dat mensen kunnen reageren op die nieuwsberichten. Om dat te kunnen doen, wordt er besloten om onder iedere nieuwsbericht een reactiemogelijkheid op te nemen.

## Opdracht
Bouw deze reactiemogelijkheid. Om het overzichtelijk te houden, gaan we uit van het tonen van de reacties en het reactieformulier in een iframe. Jouw taak is om alles te maken wat in het iframe plaatsvindt:
- Mogelijkheid tot het plaatsen van een reactie. Hierbij moet iemand ook zijn naam op kunnen geven.
- Overzicht van alle op die pagina geplaatste reacties.

### Randvoorwaarden
De oplossing is geschreven in PHP, en dient te worden aangeleverd als zip- of tar-file, óf gepubliceerd te worden op je persoonlijke Github account. In dat laatste geval ontvangen we graag een linkje naar de repository. Het staat je vrij om in je oplossing gebruik te maken van andere open source libraries/tools.

In een README file in de root van je oplossing beschrijf je welke stappen er genomen moeten worden om je oplossing te kunnen draaien en testen.
Documenteer ook op welke manier een willekeurige website jouw oplossing zou kunnen implementeren.

En tot slot: Voor ons is het belangrijk te begrijpen waarom je bepaalde beslissingen hebt genomen. Geef daarom in een heldere beschrijving weer waarom je welke keuzes gemaakt hebt.

---
## Beschrijving & keuzes

1. **Hoe gaan we dit aanpakken?**

   Mijn eerste gedachte was: "Waarom iets bouwen wat al bestaat en goed werkt? Ik stuur ze gewoon een WordPress pakket en een link naar de installatiehandleiding...", maar ik begrijp dat dat natuurlijk niet de bedoeling was met deze opdracht.
   Vervolgens ben ik in plain PHP begonnen een MVC'tje te schrijven. Op zich ook leuk, maar het leek me handiger om toch weer even wat framework ervaring op te doen.

2. **Welk framework moet ik nemen dan??**

   Dat was Googlen; ik ken wel verschillende namen, maar welke dan het best te gebruiken is voor een opdracht als dit... Ik heb PHPStorm gedownload en was met composer aan de slag gegaan en een Symfony project aangemaakt. Na alle instellingen juist gezet te hebben en een werkende app te hebben, leek het me toch wel een heel erg groot pakket voor iets wat eigenlijk een simpel klein iets moest worden.
   Het uiteindelijk gekozen framework ([Codeigniter](https://codeigniter.com)) was gewoon min of meer een random-pick. Ik had nog wat anderen geprobeerd, maar Codeigniter is in ieder geval een stuk kleiner, redelijk makkelijk in te komen en er makkelijk & snel een prototype mee te bouwen (incl. database connectie).

3. **Wat heb ik eigenlijk nodig?**

   - In ieder geval een **database**; de reacties moeten ergens naar weggeschreven en van opgehaald worden.
      Gewenste velden: reactie-id, nieuwsbericht-id, naam commentator, reactie.
      *Ik zie, bij het nalopen van deze readme, dat ik er zelf nog wat velden bij heb verzonnen: e-mail commentator, datum/tijd reactie.*

   - Een **omvattende pagina** (prototype voor een nieuwspagina, waarin het iframe verwerkt is) is voor het gemak en het kunnen testen ook wel handig.
      Gewenste 'features': menu met verschillende nieuwsbericht-id's (om het nog een klein beetje waarheidsgetrouw te laten lijken), het iframe.

   - Het **iframe met een formulier**.  
      Gewenste velden: naam commentator, reactie (en email). Het nieuwsbericht-id wordt via de iframe url meegegeven en in een hidden field in het formulier opgeslagen.
      *Netter zou zijn om ook nog iets van een **honeypot of captcha** in te bouwen, om bots buiten de deur te houden. Hiervan ben ik me bewust, maar dit is vooralsnog nu nog even een @TODO.*

   - Een **overzicht van de eerder geposte reacties**.  
      Gewenste 'features': melding als er geen reacties zijn, geordend op datum (nieuwste eerst).  
      Per reactie: naam & reactie. Als extra heb ik hier ook het e-mailadres weer toegevoegd en een "dagen-geleden" feature ingebouwd, die tot een week (8 dagen) terug het aantal minuten/uren/dagen geleden aan geeft.

   - Indien gepost: een melding en de **geposte reactie**.  
      Gewenste 'features': terugkoppeling of het posten gelukt is en een overzicht van de verwerkte gegevens.  
      *Op dit moment is er nog geen goede error afhandeling ingebouwd. @TODO*

4. **Werkt het dan nu?**

   Ja, een demo versie is te zien op [zicht.5a2.nl](http://zicht.5a2.nl/).  
   *Uiteraard zijn er nog wat @TODO's en kan ook de CSS & JS wat beter, maar dat volgt in de iteratie ;-p*  
   Wil je ook graag testen? Clone (of download) deze repo dan voor een lokaal project, of neem contact op voor de inloggegevens.

5. **Oh, ik heb nog wel een opmerking!**

   Zin in een keiharde codereview en bugs/onjuistheden of betere oplossingen gevonden? Gooi er maar een issue tegenaan!  
   \#happytolearn :-)

## Zelf draaien & testen?
1. Installeer een [Codeigniter project](https://github.com/bcit-ci/CodeIgniter). Hulp nodig? Bekijk de [Installation Instructions](https://codeigniter.com/user_guide/installation/index.html).
2. Vervolgens kun je [deze repo](https://github.com/5A5K1A/zichtnieuws) clonen (of downloaden) en de application directory in je project overschrijven. Voor de styling kun je de assets directory toevoegen.
3. Maak een database aan om de ingevoerde reacties ook daadwerkelijk op te kunnen slaan. De query om de benodigde database aan te maken, kun je vinden via deze [aparte SQL gist](https://gist.github.com/5A5K1A/eb0d42413e3c8b2c0bcc9cb00609d59e).
4. Gebruik de gegevens (database naam, user & password) om de configuratie voor de database connectie in dit project in application/config/database.php aan te passen.
