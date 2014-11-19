Redovisning
=============================

Kmom01: PHP-baserade och MVC-inspirerade ramverk
-----------------------------
Till denna kurs har jag bytt texteditor från Notepad ++ till Sublime Text. Jag kände att notepad blir mindre och mindre praktiskt ju mer sidorna växer och JEdit trivdes jag inte alls med. Jag använder fortfarande FileZilla för uppladdning till studentservern samt wamp som lokal webbserver.

Jag har sedan tidigare använt designmönster från GRASP tidigare såsom protected variations, polymorphism och high cohesion. Därför är jag redan lite introducerad till vissa av mönstren som används i ramverk samt många av begreppen som tas upp. Det kändes bra med mycket inledande läsning till kursmomentet såatt man får flera bra teoretiska källor som grund och för att se tillbaka på om det behövs. Jag har inte tidigare använt något specifikt ramverk förutom möjligtvis Bottle till Python. Det ska bli lärorikt att göra en djupdykning i just MVC som verkar vara väldigt användbart på arbetsmarknaden.

Det var till en början svårt att hänga med i genomgången av Anax-MVC och det tog tid att förstå de olika delarna av ramverket och dess uppgifter. Jag tror fortfarande att det kommer ta något kursmoment till innan man känner sig helt hemma med strukturen. Dock tror jag också att det likt tidigare Anax kommer bli smidigt att arbeta i när man väl kommit in i det. 

URL-omskrivningen tog extra lång tid innan jag förstod vad som skulle hända och hur det fungerade. Det ställde till en del problem när jag arbetade med sida på min lokala webbserver även om jag kommenterade bort RewriteBase i .htaccess-filen. Problemet berodde på att jag inte hade enablat url-omskrivning i Apaches configurations-fil.

På me-sidan bytte jag färger, logga samt satte skugga på main och lite borders. Jag har även laddat upp mitt Anax-MVC på github. Jag tror att detta kursmomentet gav mig en bra inledning till denna kursen och det känns att jag är tillräckligt insatt i PHP nu efter de två senaste kurserna för att gå vidare nu med detta som inte verkar helt oinveklat.

Kmom02: Kontroller och modeller
--------------------------------
Användningen av Composer fungerade fint för mig. Även om vi inte gjorde så jättemycket med composer, kändes det bra att få en introduktion till verktyget så att man kan fortsätta att undersöka det på egen hand. Jag har inte använt windows-terminal så mycket förut. Jag har dock arbetat en del med unix-terminal och jag var tvungen att kolla upp en del kommandon till window nu under kursmomentet. Detta eftersom kommandona jag var tvungen att använda på mitt windows 7 varken är lika de som visades i kurskoden eller unix-kommandona jag är bekant med.

Jag tycker att det såg ut att finnas en hel del användbara paket i Packagist. T.ex. loggnings-lösningar, unit-testing-ramverk m.m.. Jag hittade dock ingenting som jag kände var direkt användbart i mitt Anax-MVC för tillfället. Jag kände inte till sidan innan, så det är bra att man vet att det finns nu.

När jag väl började kika på kontroller-klasser, router och dispatcher var det lättare att förstå än vad jag först trodde. Det som tog längst tid att känna sig säker på var hur dispatchern skulle användas och meningen med den. Efter att studerat comments-grunden och lekt med den en stund kände jag mig redo att utöka den.

Jag tycker att comments var en bra grund att bygga på. Något som man fick lägga till som kunde ha funnits innan i CommentsInSession-klassen är ett fält för en unik identifierare, vilket är nödvändigt om man ska ha flera oberoende kommentars-sektioner på en webbplats.

I övrigt gick det bra att arbeta med uppgiften, men jag gjorde misstaget att inte ta med i beräkningarna från början att det skulle vara möjligt med två oberoende comments-moduler. Det blev mycket svårare att lägga till det efteråt än om jag hade tänkt på det från början eftersom det skulle ändras på många ställen i koden och det blev fel och förvirring innan jag fick ihop alltsammans. Jag lade till avatar-funktion innna jag såg att extrauppgiften var att använda Gravatar, men jag valde att behålla min avatar-lösning ändå.

Jag tycker att detta kursomoment - precis som tänkt - gav mig en möjlighet att bekanta mig med ramverket. Jag har fått uträtat en hel del frågetecken som uppstod vi kmom1. 