<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 06.06.2017
 * Time: 04:45
 */

namespace AppBundle\Controller;

/**
 * Include everything else
 */

use AppBundle\Entity\Mitarbeiter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Include everything for the Forms
 */

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class mitarbeiterController extends Controller
{
    /*
    * Mitarbeier werden hier angezeigt
    */
    public function anzeigenAction()
    {
        $mitarbeiter = $this->getDoctrine()
            ->getRepository('AppBundle:Mitarbeiter')
            ->findAll();

        return $this->render('mitarbeiter/anzeigen.html.twig', array(
            'mitarbeiter' => $mitarbeiter
        ));
    }
    /*
     * Mitarbeier kann hier erstellt werden!
     */
    public function erstellenAction(Request $request)
    {
        $mitarbeiter = new mitarbeiter;

        $form = $this->createFormBuilder($mitarbeiter)
            //TextType:
            ->add('vorname', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('nachname', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('strasse', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('hausnummer', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('ort', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('geburtsort', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('sozialversicherungsausweiss', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('bruttoarbeitslohn', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('bewerbung', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('foto', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('arbeitszeugnis', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('personalausweissnummer', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('bildungsabschluss', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('krankenkasse', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))

            // E-MailType
            ->add('email', EmailType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))

            // NumberType
            ->add('steueridentifiktationsnummer', NumberType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('arbeitsstunden', NumberType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('postleitzahl', NumberType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('telefon', NumberType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))


            // ChoiceType
            ->add('familienstand', ChoiceType::class, array('choices' => array(
                'ledig' => 'ledig',
                'verheiratet' => 'verheiratet',
                'verwitwet' => 'verwitwet',
                'geschieden' => 'geschieden',
                'Ehe aufgehoben' => 'Ehe aufgehoben',
                'in eingetragener Lebenspartnerschaft' => 'in eingetragener Lebenspartnerschaft',
                'durch Tod aufgelöste Lebenspartnerschaft' => 'durch Tod aufgelöste Lebenspartnerschaft',
                'aufgehobene Lebenspartnerschaft' => 'aufgehobene Lebenspartnerschaft',
                'durch Todeserklärung aufgelöste Lebenspartnerschaft' => 'durch Todeserklärung aufgelöste Lebenspartnerschaft',
                'nicht bekannt' => 'nicht bekannt'),
                'attr' => array('class' => 'form-control', 'style' =>'margin-bottom:15px')))

            ->add('abteilung', ChoiceType::class, array('choices' => array(
                'Name der Abteilung' => 'Name der Abteilung',
                'Name der Abteilung1' => 'Name der Abteilung1'),
                'attr' => array('class' => 'form-control', 'style' =>'margin-bottom:15px')))

            ->add('position', ChoiceType::class, array('choices' => array(
                'Mitarbeiter' => 'Mitarbeiter',
                'Teamleiter' => 'Teamleiter',
                'Kitaleiter' => 'Kitaleiter',
                'Geschäftsführer' => 'Geschäftsführer'),
                'attr' => array('class' => 'form-control', 'style' =>'margin-bottom:15px')))

            ->add('steuerklasse', ChoiceType::class, array( 'choices' => array(
                'eins' => 'I',
                'zwei' => 'II',
                'drei' => 'III',
                'vier' => 'IV',
                'fünf' => 'V',
                'sechs' => 'VI'),
                'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))

            //DateType + BirthsdayType Typen

            ->add('einstellungsdatum', DateType::class, array(
                'placeholder' => array(
                    'year' => 'Jahr', 'month' => 'Monat', 'day' => 'Tag'),
                'attr' => array('class' => 'form-control', 'style' =>'margin-bottom:15px')))

            ->add('geburtsdatum', BirthdayType::class, array(
                'placeholder' => array(
                    'year' => 'Jahr',
                    'month' => 'Monat',
                    'day' => 'Tag'),
                'attr' => array('class' => 'form-control', 'style' =>'margin-bottom:15px')))

            // Bestätigungbutton um das Formular zu übernehmen
            ->add('save', SubmitType::class, array('label' => 'Erstelle Mitarbeiter', 'attr' => array('class' => 'btn btn-primary', 'style' =>'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //getData
            //Persönliche Daten
            $vorname = $form['vorname']->getData();
            $nachname = $form['nachname']->getData();
            $strasse = $form['strasse']->getData();
            $hausnummer = $form['hausnummer']->getData();
            $postleitzahl = $form['postleitzahl']->getData();
            $ort = $form['ort']->getData();
            $geburtsdatum = $form['geburtsdatum']->getData();
            $geburtsort = $form['geburtsort']->getData();
            $familienstand = $form['familienstand']->getData();
            $personalausweissnummer = $form['personalausweissnummer']->getData();
            $telefon = $form['telefon']->getData();

            // Unternehmensdaten
            $abteilung = $form['abteilung']->getData();
            $position = $form['position']->getData();
            $einstellungsdatum = $form['einstellungsdatum']->getData();
            $steuerklasse = $form['steuerklasse']->getData();
            $steueridentifiktationsnummer = $form['steueridentifiktationsnummer']->getData();
            $arbeitsstunden = $form['arbeitsstunden']->getData();
            $krankenkasse = $form['krankenkasse']->getData();
            $bildungsabschluss = $form['bildungsabschluss']->getData();

            // Alle anderen zum einordnen:
            $sozialversicherungsausweiss = $form['sozialversicherungsausweiss']->getData();
            $bruttoarbeitslohn = $form['bruttoarbeitslohn']->getData();
            $bewerbung = $form['bewerbung']->getData();
            $foto = $form['foto']->getData();
            $arbeitszeugnis = $form['arbeitszeugnis']->getData();
            $email = $form ['email']->getData();

            //data
            $mitarbeiter->setVorname($vorname);
            $mitarbeiter->setNachname($nachname);
            $mitarbeiter->setStrasse($strasse);
            $mitarbeiter->setHausnummer($hausnummer);
            $mitarbeiter->setPostleitzahl($postleitzahl);
            $mitarbeiter->setOrt($ort);
            $mitarbeiter->setGeburtsdatum($geburtsdatum);
            $mitarbeiter->setGeburtsort($geburtsort);
            $mitarbeiter->setFamilienstand($familienstand);
            $mitarbeiter->setPersonalausweissnummer($personalausweissnummer);
            $mitarbeiter->setTelefon($telefon);

             // Unternehmensdaten
            $mitarbeiter->setAbteilung($abteilung);
            $mitarbeiter->setPosition($position);
            $mitarbeiter->setEinstellungsdatum($einstellungsdatum);
            $mitarbeiter->setSteuerklasse($steuerklasse);
            $mitarbeiter->setSteueridentifiktationsnummer($steueridentifiktationsnummer);
            $mitarbeiter->setArbeitsstunden($arbeitsstunden);
            $mitarbeiter->setKrankenkasse($krankenkasse);
            $mitarbeiter->setBildungsabschluss($bildungsabschluss);
            // Alle anderen zum einordnen:
            $mitarbeiter->setSozialversicherungsausweiss($sozialversicherungsausweiss);
            $mitarbeiter->setBruttoarbeitslohn($bruttoarbeitslohn);
            $mitarbeiter->setBewerbung($bewerbung);
            $mitarbeiter->setFoto($foto);
            $mitarbeiter->setArbeitszeugnis($arbeitszeugnis );
            $mitarbeiter->setEmail($email);

            $em = $this->getDoctrine()->getManager();

            $em->persist($mitarbeiter);
            $em->flush();

            $this->addFlash(
                'notice',
                'Der Mitarbeiter wurde erstellt!'
            );

            return $this->redirectToRoute('Mitarbeiter_anzeigen');
        }

        return $this->render('mitarbeiter/erstellen.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function detailsAction($id){

        $mitarbeiter = $this->getDoctrine()
            ->getRepository('AppBundle:Mitarbeiter')
            ->find($id);

        return $this->render('mitarbeiter/details.html.twig', array(
            'mitarbeiter' => $mitarbeiter
        ));
    }

    public function löschenAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $mitarbeiter = $em->getRepository('AppBundle:Mitarbeiter')->find($id);

        $em->remove($mitarbeiter);
        $em->flush();

        $this->addFlash(
            'notice',
            'Mitarbeiter gelöscht!'
        );

        return $this->redirectToRoute('Mitarbeiter_anzeigen');
    }

}