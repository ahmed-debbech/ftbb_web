<?php

namespace App\Controller;

use App\Entity\Options;
use App\Entity\Poll;
use App\Form\OptionsType;
use App\Utils\Utilities;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PollType;
use App\Entity\Vote;
class PollController extends AbstractController
{

    /**
//     * @Route("/poll", name="poll")
//     */
    public function index(Request $request):response
    {   $var = $request->query->get('users');
        $poll = new Poll();
        if ($var != "") {

            $query = $this->getDoctrine()->getRepository(poll::class)->createQueryBuilder('p');
            $query->where('p.description LIKE :descr')
                ->setParameter("descr", "%$var%")
                ->getQuery();

            $poll = $query->getQuery()->getResult();

        } else {
            $poll = $this->getDoctrine()
            ->getRepository(Poll::class)
            ->findBy(array(), array('creationDate' => 'DESC'));        }

        return $this->render('poll/index.html.twig', [
            'controller_name' => 'PollController',
            'Poll' => $poll,
        ]);
    }


    /**
     * @Route("/poll/delete/{pollId}", name="delete")
     */
    public function delete($pollId): Response
    {
        $poll = new Poll();


        $em = $this->getDoctrine()->getManager();
        $poll = $em->getRepository(Poll::class)->find($pollId);
        $em->remove($poll);
        $em->flush();

        return $this->redirectToRoute('poll');

    }
    /**
     * @Route("/poll/deleteall", name="deleteall")
     */
    public function deleteall(): Response
    {
        $poll = new Poll();


        $em = $this->getDoctrine()->getManager();
        $poll = $em->getRepository(Poll::class)->findAll();

        foreach ($poll as $p) {
            $em->remove($p);
            $em->flush();
        }

        return $this->redirectToRoute('poll');


    }



//
//        /**
//     * @Route("/poll/addpoll", name="add_poll")
//     */
//    public function addPoll(Request $request): Response{
//        $poll = new Poll();
//        $form = $this ->createForm(PollType::class, $poll);
//        $form->handleRequest($request);
//
//        if ($form ->isSubmitted()&& $form ->isValid()){
//            $em = $this ->getDoctrine()->getManager();
//            $poll->setPollId(Utilities::generateId($poll,'pollId',$this ->getDoctrine()));
//            $poll->setDescription($form->getData()->getDescription());
//
//            $dateTime = Utilities::getDateTimeObject(date("D M d, Y G:i"),"D M d, Y G:i");
//            $poll->setCreationDate($dateTime);
//            $poll->setStatus("Active");
//
//            $em->persist($poll);
//            $em->flush();
//
//            return $this->redirectToRoute('add_option');        }
//        return $this->render('poll/add.html.twig', ['form'=>$form->createView()]);
//    }

    /**
     * @Route("/poll/addpoll", name="add_poll")
     */
    public function addPoll(Request $request): Response{
        $poll = new Poll();
        $form = $this ->createForm(PollType::class, $poll);
        $form->handleRequest($request);

        if ($form ->isSubmitted()&& $form ->isValid()){
            $em = $this ->getDoctrine()->getManager();
            $poll->setPollId(Utilities::generateId($poll,'pollId',$this ->getDoctrine()));
            $poll->setDescription($form->getData()->getDescription());

            $dateTime = Utilities::getDateTimeObject(date("D M d, Y G:i"),"D M d, Y G:i");
            $poll->setCreationDate($dateTime);
            $poll->setStatus("Active");

            $em->persist($poll);
            $em->flush();

            return $this->redirectToRoute('add_option', ['poll_id'=>$poll->getPollId(),'number'=>1]);        }
        return $this->render('poll/add.html.twig', ['form'=>$form->createView()]);
    }
    /**
     * @Route("/poll/addpolloption/{number}/{poll_id}", name="add_option")
     */
    public function addOption(Request $request , $poll_id , $number): Response{
        $option = new Options();
        $form = $this ->createForm(OptionsType::class, $option);
        $form->handleRequest($request);

        if ($form ->isSubmitted()&& $form ->isValid()){
            $em = $this ->getDoctrine()->getManager();
            $option->setOptionId(Utilities::generateId($option,'optionId',$this ->getDoctrine()));
            $option->setDescription($form->getData()->getDescription());


            $poll = $em->getRepository(Poll::class)->find($poll_id);
            $option->setPoll($poll);

            $em->persist($option);
            $em->flush();

            if($number==2) {
                $vote = new Vote();
                $em = $this ->getDoctrine()->getManager();
                $vote->setVoteId(Utilities::generateId($vote,'voteId',$this ->getDoctrine()));
                $vote -> setOption($option);

                $em->persist($vote);
                $em->flush();

                return $this->redirectToRoute('poll');
            }else{
                $vote = new Vote();
                $em = $this ->getDoctrine()->getManager();
                $vote->setVoteId(Utilities::generateId($vote,'voteId',$this ->getDoctrine()));
                $vote -> setOption($option);

                $em->persist($vote);
                $em->flush();
                return $this->redirectToRoute('add_option', ['poll_id'=>$poll->getPollId(),'number'=>2]);
            }
        }
        return $this->render('poll/addopt.html.twig', ['form'=>$form->createView()]);
    }


    /**
     * @Route("/poll/Endpoll/{pollId}", name="End")
     */
    public function Endpoll($pollId): Response
    {

        $poll = new Poll();


        $em = $this->getDoctrine()->getManager();
        $poll = $em->getRepository(Poll::class)->find($pollId);
        $poll->setStatus('Ended');
        $em->flush();

        return $this->redirectToRoute('poll');

    }

    /**
     * @Route("/poll/polldisplay", name="polldisplay")
     */
    public function polldisplay(Request $request):response
    {
        $var = $request->query->get('users');
        $poll = new Poll();
        $option = new Options();


        $repository = $this->getDoctrine()->getRepository(Options::class);
        $option= $repository->findAll();


        if ($var != "") {

            $query = $this->getDoctrine()->getRepository(poll::class)->createQueryBuilder('p');
            $query->where('p.description LIKE :descr')
                ->setParameter("descr", "%$var%")
                ->getQuery();

            $poll = $query->getQuery()->getResult();

        } else {
            $poll = $this->getDoctrine()
                ->getRepository(Poll::class)
                ->findBy(array(), array('creationDate' => 'DESC'));



        }

        return $this->render('/poll/polldisplay.html.twig', [
            'controller_name' => 'PollController',
            'Poll' => $poll,
            'Options' => $option,
        ]);
    }


    /**
     * @Route("/poll/Endedpolldisplay", name="endedpolldisplay")
     */
    public function Endedpolldisplay(Request $request):Response
    {
        $var = $request->query->get('users');
        $poll = new Poll();
        $option = new Options();
        $vote = new Vote();

        $repository = $this->getDoctrine()->getRepository(Options::class);
        $option= $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Vote::class);
        $vote= $repository->findAll();

        if ($var != "") {

            $query = $this->getDoctrine()->getRepository(poll::class)->createQueryBuilder('p');
            $query->where('p.description LIKE :descr')
                ->setParameter("descr", "%$var%")
                ->getQuery();

            $poll = $query->getQuery()->getResult();

        } else {
            $poll = $this->getDoctrine()
                ->getRepository(Poll::class)
                ->findBy(array(), array('creationDate' => 'DESC'));        }

        return $this->render('/poll/Endedpolldisplay.html.twig', [
            'controller_name' => 'TestController',
            'Poll' => $poll,
            'Options' => $option,
            'Vote'=>$vote,
        ]);
    }


}