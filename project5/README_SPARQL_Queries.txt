Richard Saney (Team Leader)
Frank Zhang
Paige Marogil
Kathryn Soll

Items in this folder:
PokeOntologyInstance.owl
README_SPARQL_Queries.txt
PokemonMap.jpg
catalog-v001.xml (this file is auto-generated if by Protege)

Ontology Description:

This Ontology describes first generation Pokemon! There are 150 Pokemon found as individual 
in the class hierarchy. Information such as location, Pokemon-type, and evolution level, 
and special evolution category can be found through querying the ontology. 

There are 15 Pokemon-types, 6 special evolution categories, 3 evolution stages, and
46 specific locations. An individual Pokemon can contain 1 or 2 Pokemon-types and the Pokemon
could be found at many different locations. A Pokemon will have only 1 evolution stage and
may belong to 1 special evolution category. 

There are hundreds of relationships between Pokemon using this information.
An official map of the Pokemon Kanto Region where this information was derived from is included. 

SPARQL Queries
Instructions: 

In Protege, navigate to Window -> Views -> Query view -> SPARQL query.
Copy/paste the following code snippets into the editor.
Click 'Execute'.

These 3 examples show the description followed by the query code.
The resulting output of each is shown below the last query code example. 

Query1:
List in alphabetical order all of the Pokemon and their types that share
at least one same type with the Pokemon Charizard.
_______________________________________________________________________________________

PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX owl: <http://www.w3.org/2002/07/owl#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
PREFIX pkmn: <http://www.semanticweb.org/kathryn/ontologies/2016/9/untitled-ontology-4#>

SELECT DISTINCT ?pokemon ?type
WHERE {
	pkmn:Charizard rdf:type ?type
	.
	?type rdfs:subClassOf pkmn:Type
	.
	?pokemon rdf:type ?type
}
ORDER BY ?pokemon

_______________________________________________________________________________________

Query2:
List all Water-type Pokemon that have evolved at least once (stage2 or stage3 Pokemon).
_______________________________________________________________________________________

PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX owl: <http://www.w3.org/2002/07/owl#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
PREFIX pkmn: <http://www.semanticweb.org/kathryn/ontologies/2016/9/untitled-ontology-4#>

SELECT DISTINCT *
WHERE {
	?pokemon rdf:type pkmn:Water
	.
	{ ?pokemon rdf:type pkmn:Stage_2 }
	UNION
	{ ?pokemon rdf:type pkmn:Stage_3 }
}

_______________________________________________________________________________________

Query3:
What are all of the types of Pokemon that can be found in each Route? List the result 
in ascending order based on the Route.
_______________________________________________________________________________________

PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX owl: <http://www.w3.org/2002/07/owl#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
PREFIX pkmn: <http://www.semanticweb.org/kathryn/ontologies/2016/9/untitled-ontology-4#>

SELECT DISTINCT ?locale ?type 
WHERE {
	?pokemon rdf:type ?locale
	.
	?locale rdfs:subClassOf pkmn:Route
	.
	?pokemon rdf:type ?type
	.
	?type rdfs:subClassOf pkmn:Type
}
ORDER BY ?locale


_______________________________________________________________________________________
_______________________________________________________________________________________

Query1 Result:

Aerodactyl	Flying	
Arcanine	Fire	
Articuno	Flying	
Butterfree	Flying	
Charizard	Fire	
Charizard	Flying	
Charmander	Fire	
Charmeleon	Fire	
Dodrio	    	Flying	
Doduo	    	Flying	
Dragonite	Flying	
Farfetch'd	Flying	
Fearow  	Flying	
Flareon 	Fire	
Golbat  	Flying	
Growlithe	Fire	
Gyarados	Flying	
Magmar	    	Fire	
Moltres     	Fire	
Moltres     	Flying	
Ninetales	Fire	
Pidgeot 	Flying	
Pidgeotto	Flying	
Pidgey	    	Flying	
Ponyta	    	Fire	
Rapidash	Fire	
Scyther	    	Flying	
Spearow	    	Flying	
Vulpix     	Fire	
Zapdos	   	Flying	
Zubat	   	Flying

_______________________________________________________________________________________

Query2 Result:

Kabutops	
Tentacruel	
Slowbro	
Poliwhirl	
Golduck	
Seadra	
Kingler	
Omastar	
Vaporeon	
Starmie	
Gyarados	
Dewgong	
Cloyster	
Seaking	
Wartortle	
Blastoise	
Poliwrath

_______________________________________________________________________________________

Query3 Result:

Route_01    	Normal	
Route_01	Flying	
Route_02	Bug	
Route_02	Poison	
Route_02	Normal	
Route_02	Psychic	
Route_02	Flying	
Route_03	Ground	
Route_03	Fighting	
Route_03	Normal	
Route_03	Flying	
Route_04	Ground	
Route_04	Poison	
Route_04	Fighting	
Route_04	Normal	
Route_04	Water	
Route_04	Flying	
Route_05	Poison	
Route_05	Fighting	
Route_05	Grass	
Route_05	Normal	
Route_05	Psychic	
Route_05	Flying	
Route_06	Poison	
Route_06	Fighting	
Route_06	Grass	
Route_06	Normal	
Route_06	Psychic	
Route_06	Water	
Route_06	Flying	
Route_07	Fire	
Route_07	Poison	
Route_07	Fighting	
Route_07	Grass	
Route_07	Normal	
Route_07	Psychic	
Route_07	Flying	
Route_08	Fire	
Route_08	Ground	
Route_08	Poison	
Route_08	Fighting	
Route_08	Normal	
Route_08	Psychic	
Route_08	Flying	
Route_09	Ground	
Route_09	Poison	
Route_09	Normal	
Route_09	Flying	
Route_10	Ground	
Route_10	Poison	
Route_10	Fighting	
Route_10	Electric	
Route_10	Normal	
Route_10	Psychic	
Route_10	Water	
Route_10	Flying	
Route_11	Ground	
Route_11	Poison	
Route_11	Normal	
Route_11	Psychic	
Route_11	Water	
Route_11	Flying	
Route_12	Bug	
Route_12	Poison	
Route_12	Grass	
Route_12	Normal	
Route_12	Psychic	
Route_12	Water	
Route_12	Flying	
Route_13	Bug	
Route_13	Poison	
Route_13	Grass	
Route_13	Normal	
Route_13	Water	
Route_13	Flying	
Route_14	Bug	
Route_14	Poison	
Route_14	Grass	
Route_14	Normal	
Route_14	Flying	
Route_15	Bug	
Route_15	Poison	
Route_15	Grass	
Route_15	Normal	
Route_15	Flying	
Route_16	Normal	
Route_16	Flying	
Route_17	Fire	
Route_17	Poison	
Route_17	Normal	
Route_17	Water	
Route_17	Flying	
Route_18	Poison	
Route_18	Normal	
Route_18	Water	
Route_18	Flying	
Route_19	Poison	
Route_19	Water	
Route_20	Poison	
Route_20	Water	
Route_21	Poison	
Route_21	Grass	
Route_21	Normal	
Route_21	Water	
Route_21	Flying	
Route_22	Poison	
Route_22	Fighting	
Route_22	Normal	
Route_22	Water	
Route_22	Flying	
Route_23	Ground	
Route_23	Poison	
Route_23	Fighting	
Route_23	Normal	
Route_23	Psychic	
Route_23	Water	
Route_23	Flying
