<?php
session_start();
$profile_type = $_SESSION['profile_type'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>CABapp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="templates\pagesComponents\navbar\assets\img\insigneAir.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="templates\login\css\style.css">
    <link rel="stylesheet" href="templates\dashboard\style.css">
    <?php require('templates/pagesComponents/navbar/navbarHeader.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php require('templates/pagesComponents/navbar/navbar.php'); ?>
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0" id="whole">
        <div class="mt-1 mb-3 button-container">
            <div class="row pl-0">
                <div>
                    <div>
                        <h5 align="center">
                            <u><strong>
                                    MANUEL DE PROCEDURES DU CABINET DU CHEF D’ETAT MAJOR DE L’ARMEE
                                    DE L’AIR
                                </strong></u>
                        </h5>
                    </div>
                    <p id="title">

                        1- PREREQUIS POUR MIEUX EXERCER AU SEIN DU CABINET DU CEMAIR

                    </p>
                    <p>
                        L’exercice au Cabinet du Chef d’Etat-major de l’Armée de l’Air est
                        exigent car les résultats issus des travaux influencent les avis de nos
                        partenaires extérieurs.
                    </p>
                    <p>
                        Afin de mieux exercer au sein du cabinet de Chef d’Etat-major de
                        l’Armée de l’Air, l’officier doit :
                    </p>
                    <p>
                        - Faire preuve de discipline, de disponibilité et être de bonne
                        moralité ;
                    </p>
                    <p>
                        - Connaître l’organigramme et le fonctionnement des entités
                        (bureaux et unités opérationnelles) de l’Armée de l’Air ;
                    </p>
                    <p>
                        - Connaître les types de correspondances militaires traitées et
                        avoir une bonne capacité rédactionnelle ;
                    </p>
                    <p>
                        - Avoir le sens de l’anticipation, être réactif et dynamique.
                    </p>
                    <p id="title">
                        <strong>2-</strong> <strong>ORGANISATION DU CABINET DU CEMAIR</strong>
                    </p>

                    <p>
                        <strong>
                            Le rôle du personnel du Cabinet du CEMAIR
                        </strong>
                    </p>
                    <p>
                        <strong></strong>
                    </p>
                    <p>
                        - Le <strong>CEMAIR</strong> : le Chef d’Etat-Major de l’Armée
                        de l’Air (CEMAIR) est le patron de l’Armée de l’Air de Côte d’Ivoire.
                        Il est le 1 <sup>er</sup> responsable, vis-à-vis de l’extérieur, de
                        toutes les actions posées par son personnel militaire et civil. Il
                        transmet les grandes lignes de sa vision de l’Armée de l’Air à ses
                        proches collaborateurs et coordonne tes les activités autour de cette
                        vision.
                    </p>
                    <p>
                        - Le <strong>SCEMAIR</strong> : le Sous-Chef d’Etat-Major de
                        l’Armée de l’Air est le 2 <sup>nd</sup> responsable de l’Armée de
                        l’Air. Appelé souvent, le CEMAIR 2, il seconde le CEMAIR dans ses tâches
                        quotidiennes et participe à des activités qui lui sont déléguées par le
                        CEMAIR. En cas d’absence de ce dernier, Il assure l’intérim
                        commandement de l’Armée de l’Air.
                    </p>
                    <p>
                        - Le <strong>Chef de Cabinet</strong> : C’est le chef de
                        l’environnement de travail du CEMAIR. Il est le coordinateur de toutes
                        les activités du CEMAIR, à savoir, la gestion des correspondances,
                        civiles et militaires, entrants et sortants de l’Armée de l’Air, la
                        préparation des rdv ou réunions (en interne comme à l’extérieur), la
                        gestion logistique des dossiers du CEMAIR. Il manage également le
                        personnel du Cabinet et s’assure que tous effectuent les taches qui
                        leur sont attribuées.
                    </p>
                    <p>
                        - Le <strong>Chef de Cabinet adjoint</strong> : il seconde le
                        Chef de Cabinet dans ses taches. Il est appelé à apprendre auprès du
                        Chef de Cabinet afin d’assurer son intérim en cas d’absence du pays. Il
                        joue aussi le rôle de l’<em>aide de camp de CEMAIR</em>lors de ses
                        sorties pour participer à des invitations, des réunions ou des
                        cérémonies.
                    </p>
                    <p>
                        - Le <strong>Chef de Sécurité</strong> : Il est chargé
                        d’organiser la sécurité proche du CEMAIR au travail et à domicile. Il
                        établit le programme de montée et de descente des différentes équipes
                        pour différentes positions. Ils sont chargés d’entretenir le moral de
                        leurs éléments.
                    </p>
                    <p>
                        - Les <strong>Chefs de groupe</strong> : ils sont chargés de
                        mettre en exécution les consignes de travail reçues directement du chef
                        de sécurité par les éléments de leur groupe. Ils instruisent en
                        permanence leurs hommes et les organisent sur le terrain. Chaque chef
                        de groupe assure le rôle de chef de sécurité lorsque celui-ci
                        s’absente.
                    </p>
                    <p>
                        - Le <strong>Chef du Secrétariat</strong> : Il coordonne les
                        travaux du secrétariat, à savoir, la préparation des correspondances
                        (cachet, date, numérotation, mise en enveloppe) pour leur transmission,
                        la réception du dossier par le coursier pour les dépôts, l’archivage
                        des dossiers. Il organise également la réception de dossiers personnels
                        et déclenche les procédures administratives liées à ces dossiers.
                    </p>
                    <p>
                        - Les <strong>secrétaires</strong> : ils assistent le Chef de
                        secrétariat dans ses taches.
                    </p>
                    <p>
                        - Les <strong>plantons</strong> : Ils sont chargés transmettre
                        le courrier ou autres documents main à main aux destinataires qui leur
                        seront indiqués. Ils se chargent de mettre à disposition le plat pour
                        le personnel du cabinet.
                    </p>
                    <p>
                        - La <strong>secrétaire permanente du CEMAIR</strong> : appelée
                        aussi secrétaire particulière du CEMAIR, elle prépare son bureau chaque
                        matin, avant et après les réunions. Elle reçoit les demandes d’audience
                        particulières et les transmettre au CEMAIR.
                    </p>
                </div>
                <div>
                    <p id="title">
                        3-PROCEDURES DE TRAVAIL
                    </p>
                    <p>
                        Les activités du cabinet du CEMAIR peuvent être regroupées en trois (03)
                        catégories :
                    </p>
                    <p id="subtitle">

                        a- La gestion administrative du cabinet du CEMAIR

                    </p>

                    <table id="firstTab" border="1" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td width="201">
                                    <p align="center">
                                        <strong>ACTIVITES</strong>
                                    </p>
                                </td>
                                <td width="593">
                                    <p align="center">
                                        <strong>ETAPES</strong>
                                    </p>
                                </td>
                                <td width="208">
                                    <p align="center">
                                        <strong>RESPONSABLES</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="201">
                                    <p align="center">
                                        REDACTION DE CORRESPONDANCES ET DISCOURS
                                    </p>
                                </td>
                                <td width="593" valign="top">
                                    <p>
                                        - Rédiger les correspondances qui auront pour
                                        source première le Cabinet
                                    </p>
                                    <p>
                                        -
                                        <a href="docs\templates\MSG.docx">
                                            Message
                                        </a>
                                    </p>
                                    <p>
                                        -
                                        <a
                                            href="docs\templates\NDS.docx">
                                            Note de service
                                        </a>
                                    </p>
                                    <p>
                                        -
                                        <a
                                            href="docs\templates\INVITATION.docx">
                                            Lettre d’invitation
                                        </a>
                                        ;
                                        <a
                                            href="file:///D:/TRAVAIL%20CABINET/ATTESTATIONS/ATTESTATION%20MECANICIENS%20HELICONIA.docx">
                                            attestation pour équipage
                                        </a>
                                    </p>
                                    <p>
                                        -
                                        <a href="docs\templates\BE.docx">
                                            Bordereau d’envoi
                                        </a>
                                    </p>
                                    <p>
                                        -
                                        <a
                                            href="docs\templates\CPC.docx">
                                            Certificat de présence au corps
                                        </a>
                                    </p>
                                    <p>
                                        -
                                        <a href="docs\templates\COURRIERS.docx">
                                            Courrier
                                        </a>
                                    </p>
                                    <p>
                                        -
                                        <a
                                            href="index.php?action=intMOgenerator">
                                            Ordre de mission intérieur
                                        </a>
                                    </p>
                                    <p>
                                        -
                                        <a
                                            href="index.php?action=extMOgenerator"">
                                            Ordre de mission extérieur
                                        </a>
                                        pour servir de laissez-passer
                                    </p>
                                    <p>
                                        -
                                        <a
                                            href="docs\templates\COURRIER POUR DOM.docx">
                                            Courrier
                                        </a>
                                        de demande d’ordre de mission
                                    </p>
                                    <p>
                                        -
                                        <a
                                            href="index.php?action=DOMgenerator">
                                            Demande d’ordre de mission
                                        </a>
                                    </p>
                                    <p>
                                        -
                                        <a href="file:///D:/TRAVAIL%20CABINET/BON/BON%20POUR%201.docx">
                                            Bon pour
                                        </a>
                                        (suivre les bons et effectuer leurs recouvrements auprès
                                        de la régie Air)
                                    </p>
                                    
                                    <p>
                                        -
                                        <a
                                            href="docs\templates\PASSPORT.docx">
                                            Demande de renouvellement ou d’établissement de
                                            passeport
                                        </a>
                                    </p>
                                    <p>
                                        -
                                        <a
                                            href="docs\templates\VISA.docx">
                                            Demande de renouvellement ou d’établissement de visa
                                        </a>
                                    </p>
                                    <p>
                                        - Proposer
                                        <a href="">
                                            un discours
                                        </a>
                                        pour l’intervention de l’autorité à une cérémonie ou un
                                        événement
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        - <strong>Chef de Cabinet</strong>
                                    </p>
                                    <p>
                                        - <strong>Chef de Cabinet adjoint</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="201">
                                    <p align="center">
                                        ETABLISSEMENT ET SUIVI DE L’AGENDA DU CEMAIR
                                    </p>
                                    <p align="center">
                                        (voir
                                        <a
                                            href="docs\templates\PRÉVISIONS_ACT.docx">
                                            modèle
                                        </a>
                                        d’agenda du CEMAIR)
                                    </p>
                                </td>
                                <td width="593" valign="top">
                                    <p>
                                        - S’appuyer sur l’agenda du CEMGA
                                    </p>
                                    <p>
                                        - S’appuyer sur les activités internes de l’Armée
                                        de l’Air (voir les notes de services ou les messages)
                                    </p>
                                    <p>
                                        - S’appuyer sur les invitations reçues (cartes
                                        d’invitation ou courriers extérieurs)
                                    </p>
                                    <p>
                                        - Actualiser l’agenda du CEMAIR chaque veille pour
                                        le jour suivant
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        - <strong>Chef de Cabinet adjoint</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="201">
                                    <p align="center">
                                        PREPARATION DES REUNIONS AVEC AUTRES RESPONSABLES
                                        EXTERIEURS
                                    </p>
                                </td>
                                <td width="593" valign="top">
                                    <p>
                                        - Préparer
                                        <a href="docs\templates\MEMOEXT.docx">
                                            MEMO
                                        </a>
                                        CEMAIR
                                    </p>
                                    <p>
                                        - Préparer le document et faire des copies, en
                                        support physique (au moins 03 copies) et numérique (au
                                        moins 02 clés USB)
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        - <strong>Chef de Cabinet</strong>
                                    </p>
                                    <p>
                                        - <strong>Chef de Cabinet adjoint</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="201">
                                    <p align="center">
                                        PREPARATION DES REUNIONS EMAIR
                                    </p>
                                </td>
                                <td width="593" valign="top">
                                    <p>
                                        - Préparer
                                        <a
                                            href="docs\templates\PRESENCE.docx">
                                            liste
                                        </a>
                                        de présence (actualiser la date et les noms des
                                        participants s’il y a changement)
                                    </p>
                                    <p>
                                        - Préparer
                                        <a
                                            href="docs\templates\MEMEMAIR.docx">
                                            MEMO
                                        </a>
                                        CEMAIR
                                    </p>
                                    <p>
                                        - Faire un procès-verbal de réunion
                                    </p>
                                    <p>
                                        - Etablir et suivre la
                                        <a
                                            href="">
                                            matrice
                                        </a>
                                        des diligences et des instructions du CEMAIR
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        - <strong>Chef de Cabinet</strong>
                                    </p>
                                    <p>
                                        - <strong>Chef de Cabinet adjoint</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="201">
                                    <p align="center">
                                        GESTION DES CORRESPONDANCES
                                    </p>
                                </td>
                                <td width="593" valign="top">
                                    <p>
                                        - Orienter le courrier &lt;&lt;arrivée&gt;&gt; vers
                                        le ou les destinataires convenables
                                    </p>
                                    <p>
                                        - Vérifier et corriger les correspondances
                                        &lt;&lt;départ&gt;&gt; avant la signature de l’autorité
                                    </p>
                                    <p>
                                        - S’assurer de la distribution effective des
                                        courriers par le coursier
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        - <strong>Chef de Cabinet</strong>
                                    </p>
                                    <p>
                                        - <strong>Chef de Cabinet adjoint</strong>
                                    </p>
                                    <p>
                                        - <strong>Chef du secrétariat</strong>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div>
                    <p id="subtitle">
                        b- Le suivi logistique du Cabinet du CEMAIR

                    </p>
                    <table id="secondTab" border="1" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td width="193">
                                    <p align="center">
                                        <strong>ACTIVITES</strong>
                                    </p>
                                </td>
                                <td width="600">
                                    <p align="center">
                                        <strong>ETAPES</strong>
                                    </p>
                                </td>
                                <td width="208">
                                    <p align="center">
                                        <strong>RESPONSABLES</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="193">
                                    <p align="center">
                                        GESTION DES FACTURES ET ABONNEMENTS
                                    </p>
                                </td>
                                <td width="600" valign="top">
                                    <p>
                                        - Suivre les factures Electricité et eau (rappelez
                                        Hamilton pour cela) pour les domiciles du CEMAIR
                                    </p>
                                    <p>
                                        - Vérifier à partir du 06 du mois les factures
                                        ORANGE du téléphone du CEMAIR, de l’internet Domicile du
                                        CEMAIR et du CABINET via le lien
                                        <a href="https://myfacture.orange.ci/basic_webmail">
                                            https://myfacture.orange.ci/basic_webmail
                                        </a>
                                    </p>
                                    <div align="center">
                                        <table border="1" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="176" valign="top">
                                                        <p>
                                                            Désignation
                                                        </p>
                                                    </td>
                                                    <td width="104" valign="top">
                                                        <p>
                                                            Identifiant
                                                        </p>
                                                    </td>
                                                    <td width="122" valign="top">
                                                        <p>
                                                            Mot de passe
                                                        </p>
                                                    </td>
                                                    <td width="135" valign="top">
                                                        <p>
                                                            Numéro de la ligne
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="176" valign="top">
                                                        <p>
                                                            Téléphone CEMAIR
                                                        </p>
                                                    </td>
                                                    <td width="104" valign="top">
                                                        <p>
                                                            1.46554096
                                                        </p>
                                                    </td>
                                                    <td width="122" valign="top">
                                                        <p>
                                                            1.46554096
                                                        </p>
                                                    </td>
                                                    <td width="135" valign="top">
                                                        <p>
                                                            0707560303
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="176" valign="top">
                                                        <p>
                                                            Internet domicile CEMAIR
                                                        </p>
                                                    </td>
                                                    <td width="104" valign="top">
                                                        <p>
                                                            1.71175671
                                                        </p>
                                                    </td>
                                                    <td width="122" valign="top">
                                                        <p>
                                                            1.71175671
                                                        </p>
                                                    </td>
                                                    <td width="135" valign="top">
                                                        <p>
                                                            2721510179
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="176" valign="top">
                                                        <p>
                                                            Internet Cabinet CEMAIR
                                                        </p>
                                                    </td>
                                                    <td width="104" valign="top">
                                                        <p>
                                                            1.71999623
                                                        </p>
                                                    </td>
                                                    <td width="122" valign="top">
                                                        <p>
                                                            1.71999623
                                                        </p>
                                                    </td>
                                                    <td width="135" valign="top">
                                                        <p>
                                                            2721511387
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <p>
                                        - Suivre le fichier
                                        <a
                                            href="file:///D:/TRAVAIL%20CABINET/ABONNEMENTS%20ET%20FACTURES/ABONNEMENTS%20(Enregistr%C3%A9%20automatiquement).docx">
                                            ci-joint
                                        </a>
                                        pour le réabonnement canal
                                    </p>
                                    <p>
                                        - Vérifier à partir du 11 du mois du la
                                        consommation des cartes de péages via le lien
                                    </p>
                                    <p>
                                        · Pont HKB
                                        <a href="http://www.pont-hkb.com/espace-abonnes/">
                                            http://www.pont-hkb.com/espace-abonnes/
                                        </a>
                                    </p>
                                    <p>
                                        · Autoroute du nord et de Grand Bassam
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        - <strong>Chef de Cabinet adjoint</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="193">
                                    <p align="center">
                                        GESTION DES VOYAGES ET MISSIONS
                                    </p>
                                </td>
                                <td width="600" valign="top">
                                    <p>
                                        - Etablir le
                                        <a
                                            href="">
                                            courrier
                                        </a>
                                        pour la demande d’ordre de mission et les
                                        <a
                                            href="">
                                            demandes
                                        </a>
                                        d’ordres de mission
                                    </p>
                                    <p>
                                        - Etablir les
                                        <a
                                            href="">
                                            ordres
                                        </a>
                                        de mission pour servir de laissez-passer
                                    </p>
                                    <p>
                                        - Appeler le handling pour la réservation du billet
                                        d’avion et de l’hotel pour la mission
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        - <strong>Chef de Cabinet</strong>
                                    </p>
                                    <p>
                                        - <strong>Chef de Cabinet adjoint</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="193">
                                    <p align="center">
                                        PREPARATION DES CADEAUX A L’OCCASION DES FETES
                                    </p>
                                </td>
                                <td width="600" valign="top">
                                    <p>
                                        - Préparer liste de récipiendaires pour le panier
                                        de
                                        <a
                                            href="">
                                            Ramadan
                                        </a>
                                        , le panier de la
                                        <a
                                            href="">
                                            fête de Noel et le nouvel an
                                        </a>
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        - <strong>Chef de Cabinet</strong>
                                    </p>
                                    <p>
                                        - <strong>Chef de Cabinet adjoint</strong>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <p id="subtitle">
                        C- La sécurité et le protocole du CEMAIR
                    </p>
                    <table id="thirdTab" border="1" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td width="194">
                                    <p align="center">
                                        <strong>ACTIVITES</strong>
                                    </p>
                                </td>
                                <td width="600">
                                    <p align="center">
                                        <strong>ETAPES</strong>
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p align="center">
                                        <strong>RESPONSABLES</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="194">
                                    <p align="center">
                                        ORGANISATION ET SUPERVISION SECURITE DOMICILES CEMAIR
                                    </p>
                                </td>
                                <td width="600" valign="top">
                                    <p>
                                        - S’assurer de la présence effective des
                                        militaires désignés pour la sécurité des domiciles du
                                        CEMAIR
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        - <strong>Chef de sécurité</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="194">
                                    <p align="center">
                                        PREPARATION DE MISSION D’ESCORTE
                                    </p>
                                </td>
                                <td width="600" valign="top">
                                    <p>
                                        - Rendre compte (rappeler) à l’autorité de
                                        l’évènement, son contenu, l’heure de début, la tenue
                                        (informer Rambo pour la préparation de la tenue du CEMAIR),
                                        l’heure de décollage du cortège
                                    </p>
                                    <p>
                                        - Informer le chef de sécurité de la mission afin
                                        de prendre les dispositions concernant l’heure de départ
                                        (entre 1h et 30 min avant le début de l’évènement),
                                        l’itinéraire à emprunter, la vitesse à adopter
                                    </p>
                                    <p>
                                        - Appeler le protocole organisateur pour la
                                        confirmation de l’évènement 1h avant
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        - <strong>Aide de camp</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="194">
                                    <p align="center">
                                        SUIVI DES ESCALES AERIENNES VIP SUR BASE ET AU PAVILLON
                                        PRESIDENTIEL
                                    </p>
                                </td>
                                <td width="600" valign="top">
                                    <p>
                                        - S’informer tôt le matin sur les aéronefs
                                        stationnés sur le tarmac (heure d’arrivée, passagers,
                                        origine, but, date et heure de retour)
                                    </p>
                                    <p>
                                        - S’informer et rendre compte au CEMAIR de la
                                        destination ou de la provenance et respectivement de
                                        l’heure de départ ou d’arrivée d’une autorité qui passera
                                        par le salon d’honneur ou le pavillon présidentiel
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        - <strong>Chef de Cabinet</strong>
                                    </p>
                                    <p>
                                        - <strong>Chef de Cabinet adjoint</strong> <strong></strong>
                                    </p>
                                    <p>
                                        - <strong>Chef de sécurité</strong>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <p id="subtitle">
                        d- Le suivi des dossiers
                    </p>
                    <table id="fourthTab" border="1" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td width="208">
                                    <p align="center">
                                        <strong>ACTIVITES</strong>
                                    </p>
                                </td>
                                <td width="586">
                                    <p align="center">
                                        <strong>ETAPES</strong>
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p align="center">
                                        <strong>RESPONSABLES</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="208">
                                    <p align="center">
                                        Demande de renouvellement ou d’établissement de passeport
                                    </p>
                                </td>
                                <td width="586" valign="top">
                                    <p>
                                        <strong>Etape 1</strong> :
                                    </p>
                                    <p>
                                        - Faire la demande de renouvellement ou d’établissement
                                        du passeport adressée au CEMGA (modèle)
                                    </p>
                                    <p>
                                        Fournir copie de l’ancien passeport (renouvellement) ou
                                        copie de la CIM (établissement)
                                    </p>
                                    <p>
                                        <strong>
                                            <em>Résultat : Obtention de la demande
                                                d’établissement ou de renouvèlement du passeport de
                                                service</em>
                                        </strong>
                                    </p>
                                    <p>
                                        Etape 2 :
                                    </p>
                                    <p>
                                        Joindre à la demande de renouvellement ou d’établissement
                                        du passeport de service reçu du MINDEF
                                    </p>
                                    <p>
                                        - L’acte de nomination au grade actuel
                                    </p>
                                    <p>
                                        - Les copies et les orignaux des pièces
                                        d’identité (CNI et CIM)
                                    </p>
                                    <p>
                                        - Certificat de présence au corps ou
                                        <a
                                            href="file:///D:/TRAVAIL%20CABINET/Attestation%20de%20prise%20de%20service.docx">
                                            Attestation de prise de service
                                        </a>
                                    </p>
                                    <p>
                                        (pour les civils de la défense) établi par le cabinet du
                                        CEMAIR
                                    </p>
                                    <p>
                                        - ordre de mission établi par le cabinet du CEMAIR
                                    </p>
                                    <p>
                                        - passeport à renouveler
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        <strong></strong>
                                    </p>
                                    <p>
                                        - <strong>Chef de Cabinet adjoint</strong> <strong></strong>
                                    </p>
                                    <p>
                                        - <strong>Officier traitant</strong>
                                    </p>
                                    <p>
                                        <strong></strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="208">
                                    <p align="center">
                                        Demande d’établissement ou de renouvellement de visa
                                    </p>
                                </td>
                                <td width="586" valign="top">
                                    <p>
                                        <strong>Etape 1</strong> :
                                    </p>
                                    <p>
                                        Faire la demande d’établissement de la note verbale
                                        adressée au CEMGA (modèle)
                                    </p>
                                    <p>
                                        <strong>
                                            <em>Résultat : Obtention de la demande de note
                                                verbale signé du MEMDEF</em>
                                        </strong>
                                    </p>
                                    <p>
                                        <strong>Etape 2</strong> :
                                    </p>
                                    <p>
                                        Joindre à la demande de note verbale signée du MEMDEF
                                    </p>
                                    <p>
                                        - Les copies et les orignaux des pièces
                                        d’identité (CNI et CIM)
                                    </p>
                                    <p>
                                        - ordre de mission établi par le cabinet du
                                        CEMAIR
                                    </p>
                                    <p>
                                        - passeport de l’intéressé
                                    </p>
                                    <p>
                                        <strong>
                                            <em>Résultat : Obtention de la note verbale du MEMAE</em>
                                        </strong>
                                    </p>
                                    <p>
                                        <strong>Etape 3</strong> :
                                    </p>
                                    <p>
                                        Adresser une demande de RDV à l’ambassade de France en
                                        joignant à la note verbale
                                    </p>
                                    <p>
                                        - Le passeport de l’intéressé
                                    </p>
                                    <p>
                                        - L’ordre de mission établi par le cabinet du
                                        CEMAIR
                                    </p>
                                    <p>
                                        <strong>Etape 4 :</strong>
                                    </p>
                                    <p>
                                        Remplir le formulaire de demande de visa en ligne grâce
                                        au lien
                                        <a href="https://france-visas.gouv.fr/web/france-visas/demande-en-ligne">
                                            https://france-visas.gouv.fr/web/france-visas/demande-en-ligne
                                        </a>
                                        (à la charge de l’intéressé)
                                    </p>
                                </td>
                                <td width="208" valign="top">
                                    <p>
                                        - <strong>Chef de Cabinet adjoint</strong> <strong></strong>
                                    </p>
                                    <p>
                                        - <strong>Officier traitant</strong>
                                    </p>
                                    <p>
                                        <strong></strong>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
</body>

</html>